<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%selected_test}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240629_124454_create_selected_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%selected_test}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(500),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-selected_test-created_by}}',
            '{{%selected_test}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-selected_test-created_by}}',
            '{{%selected_test}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-selected_test-updated_by}}',
            '{{%selected_test}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-selected_test-updated_by}}',
            '{{%selected_test}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-selected_test-created_by}}',
            '{{%selected_test}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-selected_test-created_by}}',
            '{{%selected_test}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-selected_test-updated_by}}',
            '{{%selected_test}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-selected_test-updated_by}}',
            '{{%selected_test}}'
        );

        $this->dropTable('{{%selected_test}}');
    }
}
