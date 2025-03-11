<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card_assigned_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%card_data}}`
 * - `{{%card_assigned}}`
 */
class m240730_114947_create_card_assigned_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card_assigned_item}}', [
            'id' => $this->primaryKey(),
            'card_data_id' => $this->integer(),
            'card_assigned_id' => $this->integer(),
        ]);

        // creates index for column `card_data_id`
        $this->createIndex(
            '{{%idx-card_assigned_item-card_data_id}}',
            '{{%card_assigned_item}}',
            'card_data_id'
        );

        // add foreign key for table `{{%card_data}}`
        $this->addForeignKey(
            '{{%fk-card_assigned_item-card_data_id}}',
            '{{%card_assigned_item}}',
            'card_data_id',
            '{{%card_data}}',
            'id'
        );

        // creates index for column `card_assigned_id`
        $this->createIndex(
            '{{%idx-card_assigned_item-card_assigned_id}}',
            '{{%card_assigned_item}}',
            'card_assigned_id'
        );

        // add foreign key for table `{{%card_assigned}}`
        $this->addForeignKey(
            '{{%fk-card_assigned_item-card_assigned_id}}',
            '{{%card_assigned_item}}',
            'card_assigned_id',
            '{{%card_assigned}}',
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
        // drops foreign key for table `{{%card_data}}`
        $this->dropForeignKey(
            '{{%fk-card_assigned_item-card_data_id}}',
            '{{%card_assigned_item}}'
        );

        // drops index for column `card_data_id`
        $this->dropIndex(
            '{{%idx-card_assigned_item-card_data_id}}',
            '{{%card_assigned_item}}'
        );

        // drops foreign key for table `{{%card_assigned}}`
        $this->dropForeignKey(
            '{{%fk-card_assigned_item-card_assigned_id}}',
            '{{%card_assigned_item}}'
        );

        // drops index for column `card_assigned_id`
        $this->dropIndex(
            '{{%idx-card_assigned_item-card_assigned_id}}',
            '{{%card_assigned_item}}'
        );

        $this->dropTable('{{%card_assigned_item}}');
    }
}
