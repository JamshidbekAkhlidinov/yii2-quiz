<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_tag_linker}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%post_tag}}`
 * - `{{%post}}`
 */
class m231225_081805_create_post_tag_linker_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_tag_linker}}', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer(),
            'post_id' => $this->integer(),
        ]);

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-post_tag_linker-tag_id}}',
            '{{%post_tag_linker}}',
            'tag_id'
        );

        // add foreign key for table `{{%post_tag}}`
        $this->addForeignKey(
            '{{%fk-post_tag_linker-tag_id}}',
            '{{%post_tag_linker}}',
            'tag_id',
            '{{%post_tag}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            '{{%idx-post_tag_linker-post_id}}',
            '{{%post_tag_linker}}',
            'post_id'
        );

        // add foreign key for table `{{%post}}`
        $this->addForeignKey(
            '{{%fk-post_tag_linker-post_id}}',
            '{{%post_tag_linker}}',
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
        // drops foreign key for table `{{%post_tag}}`
        $this->dropForeignKey(
            '{{%fk-post_tag_linker-tag_id}}',
            '{{%post_tag_linker}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-post_tag_linker-tag_id}}',
            '{{%post_tag_linker}}'
        );

        // drops foreign key for table `{{%post}}`
        $this->dropForeignKey(
            '{{%fk-post_tag_linker-post_id}}',
            '{{%post_tag_linker}}'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            '{{%idx-post_tag_linker-post_id}}',
            '{{%post_tag_linker}}'
        );

        $this->dropTable('{{%post_tag_linker}}');
    }
}
