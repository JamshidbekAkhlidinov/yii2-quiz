<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m241021_070857_add_created_by_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%subject}}', 'created_by', $this->integer());
        $this->addColumn('{{%subject}}', 'updated_by', $this->integer());

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-subject-created_by}}',
            '{{%subject}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subject-created_by}}',
            '{{%subject}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-subject-updated_by}}',
            '{{%subject}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subject-updated_by}}',
            '{{%subject}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-subject-created_by}}',
            '{{%subject}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-subject-created_by}}',
            '{{%subject}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-subject-updated_by}}',
            '{{%subject}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-subject-updated_by}}',
            '{{%subject}}'
        );

        $this->dropColumn('{{%subject}}', 'created_by');
        $this->dropColumn('{{%subject}}', 'updated_by');
    }
}
