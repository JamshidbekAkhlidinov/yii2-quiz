<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card_data}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240712_054205_create_card_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card_data}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'text' => $this->text(),
            'type' => $this->integer(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-card_data-subject_id}}',
            '{{%card_data}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-card_data-subject_id}}',
            '{{%card_data}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-card_data-created_by}}',
            '{{%card_data}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-card_data-created_by}}',
            '{{%card_data}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-card_data-updated_by}}',
            '{{%card_data}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-card_data-updated_by}}',
            '{{%card_data}}',
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
        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-card_data-subject_id}}',
            '{{%card_data}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-card_data-subject_id}}',
            '{{%card_data}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-card_data-created_by}}',
            '{{%card_data}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-card_data-created_by}}',
            '{{%card_data}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-card_data-updated_by}}',
            '{{%card_data}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-card_data-updated_by}}',
            '{{%card_data}}'
        );

        $this->dropTable('{{%card_data}}');
    }
}
