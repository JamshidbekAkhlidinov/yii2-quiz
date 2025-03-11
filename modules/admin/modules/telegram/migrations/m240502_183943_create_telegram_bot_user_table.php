<?php
/*
 *  Jamshidbek Akhlidinov
 *   28 - 5 2024 12:52:32
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_bot_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%telegram_company}}`
 */
class m240502_183943_create_telegram_bot_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_bot_user}}', [
            'id' => $this->primaryKey(),
            'telegram_company_id' => $this->integer(),
            'telegram_user_id' => $this->string(),
            'username' => $this->string(),
            'phone_number' => $this->string(),
            'balance' => $this->double(),
            'is_admin' => $this->integer()->defaultValue(0),
            'is_block' => $this->integer()->defaultValue(0),
            'step' => $this->integer(),
            'full_name' => $this->string(),
            'options' => $this->text(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        // creates index for column `telegram_company_id`
        $this->createIndex(
            '{{%idx-telegram_bot_user-telegram_company_id}}',
            '{{%telegram_bot_user}}',
            'telegram_company_id'
        );

        // add foreign key for table `{{%telegram_company}}`
        $this->addForeignKey(
            '{{%fk-telegram_bot_user-telegram_company_id}}',
            '{{%telegram_bot_user}}',
            'telegram_company_id',
            '{{%telegram_company}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%telegram_company}}`
        $this->dropForeignKey(
            '{{%fk-telegram_bot_user-telegram_company_id}}',
            '{{%telegram_bot_user}}'
        );

        // drops index for column `telegram_company_id`
        $this->dropIndex(
            '{{%idx-telegram_bot_user-telegram_company_id}}',
            '{{%telegram_bot_user}}'
        );

        $this->dropTable('{{%telegram_bot_user}}');
    }
}
