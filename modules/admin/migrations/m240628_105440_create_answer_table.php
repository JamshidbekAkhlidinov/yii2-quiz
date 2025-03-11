<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%test}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240628_105440_create_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'test_id' => $this->integer(),
            'question_id' => $this->integer(),
            'text' => $this->text(),
            'correct_answer' => $this->integer()->defaultValue(0),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-answer-subject_id}}',
            '{{%answer}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-answer-subject_id}}',
            '{{%answer}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `test_id`
        $this->createIndex(
            '{{%idx-answer-test_id}}',
            '{{%answer}}',
            'test_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-answer-test_id}}',
            '{{%answer}}',
            'test_id',
            '{{%test}}',
            'id'
        );

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-answer-question_id}}',
            '{{%answer}}',
            'question_id'
        );

        // add foreign key for table `{{%question}}`
        $this->addForeignKey(
            '{{%fk-answer-question_id}}',
            '{{%answer}}',
            'question_id',
            '{{%question}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-answer-created_by}}',
            '{{%answer}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-answer-created_by}}',
            '{{%answer}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-answer-updated_by}}',
            '{{%answer}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-answer-updated_by}}',
            '{{%answer}}',
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
            '{{%fk-answer-subject_id}}',
            '{{%answer}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-answer-subject_id}}',
            '{{%answer}}'
        );

        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-answer-test_id}}',
            '{{%answer}}'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            '{{%idx-answer-test_id}}',
            '{{%answer}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-answer-question_id}}',
            '{{%answer}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-answer-question_id}}',
            '{{%answer}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-answer-created_by}}',
            '{{%answer}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-answer-created_by}}',
            '{{%answer}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-answer-updated_by}}',
            '{{%answer}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-answer-updated_by}}',
            '{{%answer}}'
        );

        $this->dropTable('{{%answer}}');
    }
}
