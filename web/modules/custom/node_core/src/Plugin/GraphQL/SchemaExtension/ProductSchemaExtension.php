<?php

namespace Drupal\node_core\Plugin\GraphQL\SchemaExtension;

use Drupal\graphql\GraphQL\ResolverBuilder;
use Drupal\graphql\GraphQL\ResolverRegistryInterface;
use Drupal\graphql_compose\Plugin\GraphQL\SchemaExtension\SchemaExtensionPluginBase;

/**
 * Adds Node data to the GraphQL Compose GraphQL API.
 *
 * @SchemaExtension(
 *   id = "product_schema_extension",
 *   name = "Product Schema Extension",
 *   description = "Product GraphQL Schema Extension.",
 *   schema = "graphql_compose"
 * )
 */
class ProductSchemaExtension extends SchemaExtensionPluginBase {

  /**
   * {@inheritdoc}
   */
  public function registerResolvers(ResolverRegistryInterface $registry) {
    // Initialize builder which is used to build the resolving logic for the
    // fields. This includes the output data which is going to be produced,
    // the inputs required for resolving them (resolver arguments, other static
    // or dynamic values, or even values produced by parent resolver), then the
    // contexts which the resolver can be aware of (eg language), and other
    // essentials.
    $builder = new ResolverBuilder();

    $registry->addFieldResolver('NodeReleaseNot', 'product',
      $builder->produce('related_product_id')
        ->map('entity', $builder->fromParent()
      )
    );
  }

}
