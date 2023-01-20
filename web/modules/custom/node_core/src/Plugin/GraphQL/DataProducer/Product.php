<?php

namespace Drupal\node_core\Plugin\GraphQL\DataProducer;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\graphql\Plugin\GraphQL\DataProducer\DataProducerPluginBase;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Gets the ID of product.
 *
 * @DataProducer(
 *   id = "related_product_id",
 *   name = @Translation("Related product"),
 *   description = @Translation("Related product."),
 *   produces = @ContextDefinition("any",
 *     label = @Translation("Product entity")
 *   ),
 *   consumes = {
 *     "entity" = @ContextDefinition("entity:node",
 *       label = @Translation("Node")
 *     )
 *   }
 * )
 */
class Product extends DataProducerPluginBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
    );
  }

  /**
   * Returns current user id.
   *
   * @return int
   *   The current user id.
   */
  public function resolve(NodeInterface $node) {
    if ($node->hasField("field_product")) {
      return $node->field_product->target_id;
    }

    return NULL;
  }

}
