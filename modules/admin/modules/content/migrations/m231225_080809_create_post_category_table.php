<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m231225_080809_create_post_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'sub_text' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->datetime(),
            'created_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-post_category-created_by}}',
            '{{%post_category}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-post_category-created_by}}',
            '{{%post_category}}',
            'created_by',
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
            '{{%fk-post_category-created_by}}',
            '{{%post_category}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-post_category-created_by}}',
            '{{%post_category}}'
        );

        $this->dropTable('{{%post_category}}');
    }
}
