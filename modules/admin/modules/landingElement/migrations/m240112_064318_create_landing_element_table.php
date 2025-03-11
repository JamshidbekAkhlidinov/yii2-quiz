<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%landing_element}}`.
 */
class m240112_064318_create_landing_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%landing_element}}', [
            'id' => $this->primaryKey(),
            'key' => $this->integer(),
            'title' => $this->text(),
            'icon' => $this->string(),
            'description' => $this->text(),
            'sub_text' => $this->text(),
            'value' => $this->text(),
            'files' => $this->text(),
            'url' => $this->string(),
            'order' => $this->integer(),
            'created_at' => $this->datetime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%landing_element}}');
    }
}
