<?php

use app\modules\admin\enums\StatusEnum;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_test_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user_test}}`
 * - `{{%question}}`
 * - `{{%answer}}`
 */
class m240630_103955_create_user_test_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_test_item}}', [
            'id' => $this->primaryKey(),
            'user_test_id' => $this->integer(),
            'question_id' => $this->integer(),
            'select_answer_id' => $this->integer(),
            'select_answer' => $this->text(),
            'order' => $this->integer(),
            'is_true' => $this->integer()->defaultValue(StatusEnum::INACTIVE),
        ]);

        // creates index for column `user_test_id`
        $this->createIndex(
            '{{%idx-user_test_item-user_test_id}}',
            '{{%user_test_item}}',
            'user_test_id'
        );

        // add foreign key for table `{{%user_test}}`
        $this->addForeignKey(
            '{{%fk-user_test_item-user_test_id}}',
            '{{%user_test_item}}',
            'user_test_id',
            '{{%user_test}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-user_test_item-question_id}}',
            '{{%user_test_item}}',
            'question_id'
        );

        // add foreign key for table `{{%question}}`
        $this->addForeignKey(
            '{{%fk-user_test_item-question_id}}',
            '{{%user_test_item}}',
            'question_id',
            '{{%question}}',
            'id'
        );

        // creates index for column `select_answer_id`
        $this->createIndex(
            '{{%idx-user_test_item-select_answer_id}}',
            '{{%user_test_item}}',
            'select_answer_id'
        );

        // add foreign key for table `{{%answer}}`
        $this->addForeignKey(
            '{{%fk-user_test_item-select_answer_id}}',
            '{{%user_test_item}}',
            'select_answer_id',
            '{{%answer}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user_test}}`
        $this->dropForeignKey(
            '{{%fk-user_test_item-user_test_id}}',
            '{{%user_test_item}}'
        );

        // drops index for column `user_test_id`
        $this->dropIndex(
            '{{%idx-user_test_item-user_test_id}}',
            '{{%user_test_item}}'
        );

        // drops foreign key for table `{{%question}}`
        $this->dropForeignKey(
            '{{%fk-user_test_item-question_id}}',
            '{{%user_test_item}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-user_test_item-question_id}}',
            '{{%user_test_item}}'
        );

        // drops foreign key for table `{{%answer}}`
        $this->dropForeignKey(
            '{{%fk-user_test_item-select_answer_id}}',
            '{{%user_test_item}}'
        );

        // drops index for column `select_answer_id`
        $this->dropIndex(
            '{{%idx-user_test_item-select_answer_id}}',
            '{{%user_test_item}}'
        );

        $this->dropTable('{{%user_test_item}}');
    }
}
