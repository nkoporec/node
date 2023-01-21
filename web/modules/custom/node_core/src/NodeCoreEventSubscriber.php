<?php

namespace Drupal\node_core;

use Drupal\Core\Routing\CurrentRouteMatch;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event subscriber subscribing to KernelEvents::REQUEST.
 */
class NodeCoreEventSubscriber implements EventSubscriberInterface {

  /**
   * The current route.
   *
   * @var \Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $currentRoute;

  /**
   * NodeCoreEventSubscriber construct.
   *
   * @param \Drupal\Core\Routing\CurrentRouteMatch $route_match
   *   The current route.
   */
  public function __construct(CurrentRouteMatch $route_match) {
    $this->currentRoute = $route_match;
  }

  /**
   * Redirects from node canonical to node edit.
   *
   * @param Symfony\Component\Event\GetResponseEvent $event
   *   Symfony event.
   */
  public function redirectToNodeEdit(GetResponseEvent $event) {
    $baseUrl = $event->getRequest()->getBaseUrl();
    $attr = $event->getRequest()->attributes;
    $route = $this->currentRoute->getRouteName();

    if ($attr && $attr->get('node') && $route == "entity.node.canonical") {
      $node = $attr->get('node');
      $event->setResponse(new RedirectResponse($baseUrl . '/node/' . $node->id() . '/edit', 301));
    }

    if ($route == "entity.user.canonical") {
      $event->setResponse(new RedirectResponse($baseUrl . '/admin/content', 301));
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['redirectToNodeEdit'];

    return $events;
  }

}
