<?php

namespace Drupal\node_core\Plugin\GraphQL\SchemaExtension;

use Drupal\graphql\GraphQL\ResolverBuilder;
use Drupal\graphql\GraphQL\ResolverRegistryInterface;
use Drupal\graphql_compose\Plugin\GraphQL\SchemaExtension\SchemaExtensionPluginBase;

/**
 * Adds additional data to the GraphQL Compose GraphQL API.
 *
 * @SchemaExtension(
 *   id = "node_core_schema_extension",
 *   name = "Node core schema extension",
 *   description = "Product GraphQL Schema Extension.",
 *   schema = "graphql_compose"
 * )
 */
class NodeCoreSchemaExtension extends SchemaExtensionPluginBase {

  /**
   * {@inheritdoc}
   */
  public function registerResolvers(ResolverRegistryInterface $registry) {
    $builder = new ResolverBuilder();

    $registry->addFieldResolver('NodeReleaseNot', 'product',
      $builder->produce('related_product_id')
        ->map('entity', $builder->fromParent()
      )
    );

    $registry->addFieldResolver('Query', 'nodeByProduct',
      $builder->produce('query_product')
        ->map('id', $builder->fromArgument("product_id")
      )
    );

    $registry->addFieldResolver('Query', 'nodeByReleaseType',
      $builder->produce('query_release_type')
        ->map('id', $builder->fromArgument("release_type")
      )
    );
  }

}
