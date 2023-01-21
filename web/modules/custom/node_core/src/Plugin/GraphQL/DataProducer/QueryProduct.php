<?php

namespace Drupal\node_core\Plugin\GraphQL\DataProducer;

use Drupal\Core\Cache\RefinableCacheableDependencyInterface;
use Drupal\graphql_compose\Plugin\GraphQL\DataProducer\Entity\EntityDataProducerPluginBase;

/**
 * Queries products on the platform.
 *
 * @DataProducer(
 *   id = "query_product",
 *   name = @Translation("Query by product"),
 *   description = @Translation("Loads the nodes."),
 *   produces = @ContextDefinition("any",
 *     label = @Translation("EntityConnection")
 *   ),
 *   consumes = {
 *     "id" = @ContextDefinition("string",
 *       label = @Translation("Product id"),
 *       required = TRUE
 *     ),
 *   },
 * )
 */
class QueryProduct extends EntityDataProducerPluginBase {

  /**
   * Resolves the request to the requested values.
   *
   * @param int|null $first
   *   Fetch the first X results.
   * @param string|null $after
   *   Cursor to fetch results after.
   * @param int|null $last
   *   Fetch the last X results.
   * @param string|null $before
   *   Cursor to fetch results before.
   * @param bool $reverse
   *   Reverses the order of the data.
   * @param string $sortKey
   *   Key to sort by.
   * @param \Drupal\Core\Cache\RefinableCacheableDependencyInterface $metadata
   *   Cacheability metadata for this request.
   *
   * @return \Drupal\graphql_compose\GraphQL\ConnectionInterface
   *   An entity connection with results and data about the paginated results.
   */
  public function resolve(?string $id, RefinableCacheableDependencyInterface $metadata) {
    $nodes = \Drupal::entityTypeManager()->getStorage("node")->loadByProperties(["field_product" => $id]);
    return $nodes;
  }

}
