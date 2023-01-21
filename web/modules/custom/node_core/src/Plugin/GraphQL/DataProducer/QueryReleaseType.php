<?php

namespace Drupal\node_core\Plugin\GraphQL\DataProducer;

use Drupal\Core\Cache\RefinableCacheableDependencyInterface;
use Drupal\graphql_compose\Plugin\GraphQL\DataProducer\Entity\EntityDataProducerPluginBase;

/**
 * Queries products on the platform.
 *
 * @DataProducer(
 *   id = "query_release_type",
 *   name = @Translation("Query by release type"),
 *   description = @Translation("Loads the nodes."),
 *   produces = @ContextDefinition("any",
 *     label = @Translation("EntityConnection")
 *   ),
 *   consumes = {
 *     "id" = @ContextDefinition("string",
 *       label = @Translation("Release type"),
 *       required = TRUE
 *     ),
 *   },
 * )
 */
class QueryReleaseType extends EntityDataProducerPluginBase {

  /**
   * Resolves the request to the requested values.
   */
  public function resolve(?string $id, RefinableCacheableDependencyInterface $metadata) {
    $nodes = \Drupal::entityTypeManager()->getStorage("node")->loadByProperties(["field_release_type" => $id]);
    return $nodes;
  }

}
