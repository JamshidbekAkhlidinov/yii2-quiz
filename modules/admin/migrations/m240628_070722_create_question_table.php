<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%test}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240628_070722_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'test_id' => $this->integer(),
            'text' => $this->text(),
            'status' => $this->integer()->defaultValue(1),
            'ball' => $this->double(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-question-subject_id}}',
            '{{%question}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-question-subject_id}}',
            '{{%question}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `test_id`
        $this->createIndex(
            '{{%idx-question-test_id}}',
            '{{%question}}',
            'test_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-question-test_id}}',
            '{{%question}}',
            'test_id',
            '{{%test}}',
            'id'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-question-created_by}}',
            '{{%question}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-question-created_by}}',
            '{{%question}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-question-updated_by}}',
            '{{%question}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-question-updated_by}}',
            '{{%question}}',
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
            '{{%fk-question-subject_id}}',
            '{{%question}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-question-subject_id}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-question-test_id}}',
            '{{%question}}'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            '{{%idx-question-test_id}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-question-created_by}}',
            '{{%question}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-question-created_by}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-question-updated_by}}',
            '{{%question}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-question-updated_by}}',
            '{{%question}}'
        );

        $this->dropTable('{{%question}}');
    }
}
