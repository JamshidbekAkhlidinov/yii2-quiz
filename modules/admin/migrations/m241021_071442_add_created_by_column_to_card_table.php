<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%card}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m241021_071442_add_created_by_column_to_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%card}}', 'created_by', $this->integer());
        $this->addColumn('{{%card}}', 'updated_by', $this->integer());

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-card-created_by}}',
            '{{%card}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-card-created_by}}',
            '{{%card}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-card-updated_by}}',
            '{{%card}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-card-updated_by}}',
            '{{%card}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-card-created_by}}',
            '{{%card}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-card-created_by}}',
            '{{%card}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-card-updated_by}}',
            '{{%card}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-card-updated_by}}',
            '{{%card}}'
        );

        $this->dropColumn('{{%card}}', 'created_by');
        $this->dropColumn('{{%card}}', 'updated_by');
    }
}
