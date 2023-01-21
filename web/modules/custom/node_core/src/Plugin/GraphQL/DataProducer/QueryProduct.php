<?php

namespace Drupal\node_core\Plugin\GraphQL\DataProducer;

use Drupal\graphql_compose\Plugin\GraphQL\DataProducer\Entity\EntityDataProducerPluginBase;

/**
 * Queries nodes on the platform.
 *
 * @DataProducer(
 *   id = "query_product",
 *   name = @Translation("Query by product"),
 *   description = @Translation("Loads the nodes that containes product id."),
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
   * @param string|null $id
   *   Product id.
   *
   * @return \Drupal\node\NodeInterface[]
   *   An array of nodes
   */
  public function resolve(?string $id) {
    $nodes = $this->entityTypeManager
      ->getStorage("node")
      ->loadByProperties(["field_product" => $id]);

    return $nodes;
  }

}
