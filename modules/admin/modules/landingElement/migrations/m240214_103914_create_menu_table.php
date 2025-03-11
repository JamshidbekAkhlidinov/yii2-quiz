<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%menu}}`
 */
class m240214_103914_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'order' => $this->integer(),
            'status' => $this->integer(),
            'icon' => $this->string(),
            'parent_id' => $this->integer(),
            'type' => $this->integer(),
            'position_menu' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'label_position' => $this->integer(),
            'slug' => $this->string(),
            'item' => $this->string(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-menu-parent_id}}',
            '{{%menu}}',
            'parent_id'
        );

        // add foreign key for table `{{%menu}}`
        $this->addForeignKey(
            '{{%fk-menu-parent_id}}',
            '{{%menu}}',
            'parent_id',
            '{{%menu}}',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%menu}}`
        $this->dropForeignKey(
            '{{%fk-menu-parent_id}}',
            '{{%menu}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-menu-parent_id}}',
            '{{%menu}}'
        );

        $this->dropTable('{{%menu}}');
    }
}
