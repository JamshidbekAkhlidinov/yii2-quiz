<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_category_linker}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post_category}}`
 * - `{{%post}}`
 */
class m231225_082010_create_post_category_linker_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_category_linker}}', [
            'id' => $this->primaryKey(),
            'post_category_id' => $this->integer(),
            'post_id' => $this->integer(),
        ]);

        // creates index for column `post_category_id`
        $this->createIndex(
            '{{%idx-post_category_linker-post_category_id}}',
            '{{%post_category_linker}}',
            'post_category_id'
        );

        // add foreign key for table `{{%post_category}}`
        $this->addForeignKey(
            '{{%fk-post_category_linker-post_category_id}}',
            '{{%post_category_linker}}',
            'post_category_id',
            '{{%post_category}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_category_linker-post_id}}',
            '{{%post_category_linker}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_category_linker-post_id}}',
            '{{%post_category_linker}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%post_category}}`
        $this->dropForeignKey(
            '{{%fk-post_category_linker-post_category_id}}',
            '{{%post_category_linker}}'
        );

        // drops index for column `post_category_id`
        $this->dropIndex(
            '{{%idx-post_category_linker-post_category_id}}',
            '{{%post_category_linker}}'
        );

        // drops foreign key for table `{{%post}}`
        $this->dropForeignKey(
            '{{%fk-post_category_linker-post_id}}',
            '{{%post_category_linker}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_category_linker-post_id}}',
            '{{%post_category_linker}}'
        );

        $this->dropTable('{{%post_category_linker}}');
    }
}
