<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%card}}`
 */
class m240730_085335_create_card_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card_item}}', [
            'id' => $this->primaryKey(),
            'card_id' => $this->integer(),
            'type' => $this->integer(),
            'count' => $this->integer(),
            'deleted_at' => $this->datetime(),
        ]);

        // creates index for column `card_id`
        $this->createIndex(
            '{{%idx-card_item-card_id}}',
            '{{%card_item}}',
            'card_id'
        );

        // add foreign key for table `{{%card}}`
        $this->addForeignKey(
            '{{%fk-card_item-card_id}}',
            '{{%card_item}}',
            'card_id',
            '{{%card}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%card}}`
        $this->dropForeignKey(
            '{{%fk-card_item-card_id}}',
            '{{%card_item}}'
        );

        // drops index for column `card_id`
        $this->dropIndex(
            '{{%idx-card_item-card_id}}',
            '{{%card_item}}'
        );

        $this->dropTable('{{%card_item}}');
    }
}
