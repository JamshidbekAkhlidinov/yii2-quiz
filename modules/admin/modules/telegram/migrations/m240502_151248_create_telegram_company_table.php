<?php
/*
 *  Jamshidbek Akhlidinov
 *   28 - 5 2024 12:52:32
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_company}}`.
 */
class m240502_151248_create_telegram_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'bot_token' => $this->string(),
            'status' => $this->integer(),
            'admin_ids' => $this->string(),
            'admin_url' => $this->string(),
            'channel_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_company}}');
    }
}
