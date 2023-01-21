<?php

namespace Drupal\node_core\Plugin\GraphQL\DataProducer;

use Drupal\graphql\Plugin\GraphQL\DataProducer\DataProducerPluginBase;
use Drupal\node\NodeInterface;

/**
 * Gets field_product.
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
class Product extends DataProducerPluginBase {

  /**
   * Returns a field_product id value.
   *
   * @return int|null
   *   The product id.
   */
  public function resolve(NodeInterface $node) {
    if ($node->hasField("field_product")) {
      return $node->field_product->target_id;
    }

    return NULL;
  }

}
