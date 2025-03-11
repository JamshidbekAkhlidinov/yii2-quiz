<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_test}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%subject}}`
 * - `{{%test}}`
 * - `{{%selected_test}}`
 */
class m240630_103722_create_user_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_test}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'test_id' => $this->integer(),
            'selected_test_id' => $this->integer(),
            'total_ball' => $this->double(),
            'solve_ball' => $this->double(),
            'total_count' => $this->integer(),
            'solve_count' => $this->integer(),
            'created_at' => $this->datetime(),
            'expired_at' => $this->datetime(),
            'status' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_test-user_id}}',
            '{{%user_test}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_test-user_id}}',
            '{{%user_test}}',
            'user_id',
            '{{%user}}',
            'id'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-user_test-subject_id}}',
            '{{%user_test}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-user_test-subject_id}}',
            '{{%user_test}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `test_id`
        $this->createIndex(
            '{{%idx-user_test-test_id}}',
            '{{%user_test}}',
            'test_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-user_test-test_id}}',
            '{{%user_test}}',
            'test_id',
            '{{%test}}',
            'id'
        );

        // creates index for column `selected_test_id`
        $this->createIndex(
            '{{%idx-user_test-selected_test_id}}',
            '{{%user_test}}',
            'selected_test_id'
        );

        // add foreign key for table `{{%selected_test}}`
        $this->addForeignKey(
            '{{%fk-user_test-selected_test_id}}',
            '{{%user_test}}',
            'selected_test_id',
            '{{%selected_test}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_test-user_id}}',
            '{{%user_test}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_test-user_id}}',
            '{{%user_test}}'
        );

        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-user_test-subject_id}}',
            '{{%user_test}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-user_test-subject_id}}',
            '{{%user_test}}'
        );

        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-user_test-test_id}}',
            '{{%user_test}}'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            '{{%idx-user_test-test_id}}',
            '{{%user_test}}'
        );

        // drops foreign key for table `{{%selected_test}}`
        $this->dropForeignKey(
            '{{%fk-user_test-selected_test_id}}',
            '{{%user_test}}'
        );

        // drops index for column `selected_test_id`
        $this->dropIndex(
            '{{%idx-user_test-selected_test_id}}',
            '{{%user_test}}'
        );

        $this->dropTable('{{%user_test}}');
    }
}
