<?php

/**
 * @file
 * Contains \Drupal\Tests\file\Kernel\Migrate\d6\MigrateUploadFieldTest.
 */

namespace Drupal\Tests\file\Kernel\Migrate\d6;

use Drupal\field\Entity\FieldStorageConfig;
use Drupal\Tests\migrate_drupal\Kernel\d6\MigrateDrupal6TestBase;

/**
 * Uploads migration.
 *
 * @group migrate_drupal_6
 */
class MigrateUploadFieldTest extends MigrateDrupal6TestBase {

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->migrateFields();
  }

  /**
   * Tests the Drupal 6 upload settings to Drupal 8 field migration.
   */
  public function testUpload() {
    $field_storage = FieldStorageConfig::load('node.upload');
    $this->assertIdentical('node.upload', $field_storage->id());
    $this->assertIdentical(array('node', 'upload'), $this->getMigration('d6_upload_field')->getIdMap()->lookupDestinationID(array('')));
  }

}