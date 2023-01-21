<?php

namespace Drupal\node_core\Plugin\GraphQL\DataProducer;

use Drupal\graphql_compose\Plugin\GraphQL\DataProducer\Entity\EntityDataProducerPluginBase;

/**
 * Queries nodes on the platform.
 *
 * @DataProducer(
 *   id = "query_release_type",
 *   name = @Translation("Query by release type"),
 *   description = @Translation("Loads the nodes that contains the release type."),
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
      ->loadByProperties(["field_release_type" => $id]);

    return $nodes;
  }

}
