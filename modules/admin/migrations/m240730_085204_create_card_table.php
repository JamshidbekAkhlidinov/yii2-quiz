<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%user}}`
 */
class m240730_085204_create_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'name' => $this->string(),
            'count' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-card-subject_id}}',
            '{{%card}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-card-subject_id}}',
            '{{%card}}',
            'subject_id',
            '{{%subject}}',
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
            '{{%fk-card-subject_id}}',
            '{{%card}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-card-subject_id}}',
            '{{%card}}'
        );

        $this->dropTable('{{%card}}');
    }
}
