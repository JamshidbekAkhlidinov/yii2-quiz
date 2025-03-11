<?php

use app\models\User;
use yii\db\Migration;

class m140403_123000_user extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(40)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'oauth_client' => $this->string(),
            'oauth_client_user_id' => $this->string(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(User::STATUS_ACTIVE),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'logged_at' => $this->dateTime(),
            'verification_token' => $this->string(),
            'password_reset_token' => $this->string(),
        ]);

        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'avatar_path' => $this->string(),
            'avatar_base_url' => $this->string(),
            'locale' => $this->string(32)->notNull(),
            'gender' => $this->smallInteger(1),
            'phone_number' => $this->string(),
            'birthday' => $this->date(),
        ]);

        $this->addForeignKey(
            'fk_user',
            '{{%user_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user', '{{%user_profile}}');
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user}}');

    }
}
