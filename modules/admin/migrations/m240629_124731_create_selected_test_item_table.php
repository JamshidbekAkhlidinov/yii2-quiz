<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%selected_test_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%selected_test}}`
 * - `{{%subject}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240629_124731_create_selected_test_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%selected_test_item}}', [
            'id' => $this->primaryKey(),
            'selected_test_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'count' => $this->integer(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `selected_test_id`
        $this->createIndex(
            '{{%idx-selected_test_item-selected_test_id}}',
            '{{%selected_test_item}}',
            'selected_test_id'
        );

        // add foreign key for table `{{%selected_test}}`
        $this->addForeignKey(
            '{{%fk-selected_test_item-selected_test_id}}',
            '{{%selected_test_item}}',
            'selected_test_id',
            '{{%selected_test}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-selected_test_item-subject_id}}',
            '{{%selected_test_item}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-selected_test_item-subject_id}}',
            '{{%selected_test_item}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-selected_test_item-created_by}}',
            '{{%selected_test_item}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-selected_test_item-created_by}}',
            '{{%selected_test_item}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-selected_test_item-updated_by}}',
            '{{%selected_test_item}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-selected_test_item-updated_by}}',
            '{{%selected_test_item}}',
            'updated_by',
            '{{%user}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%selected_test}}`
        $this->dropForeignKey(
            '{{%fk-selected_test_item-selected_test_id}}',
            '{{%selected_test_item}}'
        );

        // drops index for column `selected_test_id`
        $this->dropIndex(
            '{{%idx-selected_test_item-selected_test_id}}',
            '{{%selected_test_item}}'
        );

        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-selected_test_item-subject_id}}',
            '{{%selected_test_item}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-selected_test_item-subject_id}}',
            '{{%selected_test_item}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-selected_test_item-created_by}}',
            '{{%selected_test_item}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-selected_test_item-created_by}}',
            '{{%selected_test_item}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-selected_test_item-updated_by}}',
            '{{%selected_test_item}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-selected_test_item-updated_by}}',
            '{{%selected_test_item}}'
        );

        $this->dropTable('{{%selected_test_item}}');
    }
}
