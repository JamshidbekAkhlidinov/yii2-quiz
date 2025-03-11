<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m231225_081548_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'image' => $this->string(),
            'sub_text' => $this->text(),
            'description' => $this->text(),
            'status' => $this->integer(),
            'view_count' => $this->integer(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-post-created_by}}',
            '{{%post}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-post-created_by}}',
            '{{%post}}',
            'created_by',
            '{{%user}}',
            'id',
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-post-updated_by}}',
            '{{%post}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-post-updated_by}}',
            '{{%post}}',
            'updated_by',
            '{{%user}}',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-post-created_by}}',
            '{{%post}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-post-created_by}}',
            '{{%post}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-post-updated_by}}',
            '{{%post}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-post-updated_by}}',
            '{{%post}}'
        );

        $this->dropTable('{{%post}}');
    }
}
