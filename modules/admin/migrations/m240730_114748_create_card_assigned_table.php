<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card_assigned}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%card}}`
 * - `{{%subject}}`
 * - `{{%user}}`
 */
class m240730_114748_create_card_assigned_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card_assigned}}', [
            'id' => $this->primaryKey(),
            'card_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'status' => $this->integer(),
            'assigned_at' => $this->datetime(),
            'assign_user_id' => $this->integer(),
        ]);

        // creates index for column `card_id`
        $this->createIndex(
            '{{%idx-card_assigned-card_id}}',
            '{{%card_assigned}}',
            'card_id'
        );

        // add foreign key for table `{{%card}}`
        $this->addForeignKey(
            '{{%fk-card_assigned-card_id}}',
            '{{%card_assigned}}',
            'card_id',
            '{{%card}}',
            'id'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-card_assigned-subject_id}}',
            '{{%card_assigned}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-card_assigned-subject_id}}',
            '{{%card_assigned}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `assign_user_id`
        $this->createIndex(
            '{{%idx-card_assigned-assign_user_id}}',
            '{{%card_assigned}}',
            'assign_user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-card_assigned-assign_user_id}}',
            '{{%card_assigned}}',
            'assign_user_id',
            '{{%user}}',
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
            '{{%fk-card_assigned-card_id}}',
            '{{%card_assigned}}'
        );

        // drops index for column `card_id`
        $this->dropIndex(
            '{{%idx-card_assigned-card_id}}',
            '{{%card_assigned}}'
        );

        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-card_assigned-subject_id}}',
            '{{%card_assigned}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-card_assigned-subject_id}}',
            '{{%card_assigned}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-card_assigned-assign_user_id}}',
            '{{%card_assigned}}'
        );

        // drops index for column `assign_user_id`
        $this->dropIndex(
            '{{%idx-card_assigned-assign_user_id}}',
            '{{%card_assigned}}'
        );

        $this->dropTable('{{%card_assigned}}');
    }
}
