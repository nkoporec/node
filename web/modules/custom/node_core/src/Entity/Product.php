<?php

namespace Drupal\node_core\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Product type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "product",
 *   label = @Translation("Product"),
 *   label_collection = @Translation("Products"),
 *   label_singular = @Translation("product"),
 *   label_plural = @Translation("products"),
 *   label_count = @PluralTranslation(
 *     singular = "@count product",
 *     plural = "@count products",
 *   ),
 *   admin_permission = "administer content types",
 *   config_prefix = "product",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   links = {
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "git_url",
 *   }
 * )
 */
class Product extends ConfigEntityBase {

  /**
   * The machine name of this product.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the product.
   *
   * @var string
   */
  protected $label;

  /**
   * A git url.
   *
   * @var string
   */
  protected $url;

  /**
   * {@inheritdoc}
   */
  public function id() {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function label() {
    return $this->label;
  }

  /**
   * {@inheritdoc}
   */
  public function getGitUrl() {
    return $this->git_url;
  }

}
