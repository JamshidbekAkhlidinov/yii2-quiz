<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 2 2024 13:11:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240211_081102_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'content' => $this->text(),
            'slug' => $this->string()->unique(),
            'status' => $this->integer(),
            'sidebar' => $this->integer(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-page-created_by}}',
            '{{%page}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-page-created_by}}',
            '{{%page}}',
            'created_by',
            '{{%user}}',
            'id'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-page-updated_by}}',
            '{{%page}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-page-updated_by}}',
            '{{%page}}',
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
            '{{%fk-page-created_by}}',
            '{{%page}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-page-created_by}}',
            '{{%page}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-page-updated_by}}',
            '{{%page}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-page-updated_by}}',
            '{{%page}}'
        );

        $this->dropTable('{{%page}}');
    }
}
