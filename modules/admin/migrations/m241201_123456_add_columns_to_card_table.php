<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%card}}`.
 */
class m241201_123456_add_columns_to_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // `card` jadvaliga yangi ustunlarni qo'shamiz
        $this->addColumn('{{%card}}', 'university', $this->string());
        $this->addColumn('{{%card}}', 'faculty', $this->string());
        $this->addColumn('{{%card}}', 'department', $this->string());
        $this->addColumn('{{%card}}', 'education_direction', $this->string());
        $this->addColumn('{{%card}}', 'specialty', $this->string());
        $this->addColumn('{{%card}}', 'creator', $this->string());
        $this->addColumn('{{%card}}', 'department_head', $this->string());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%card}}', 'university');
        $this->dropColumn('{{%card}}', 'faculty');
        $this->dropColumn('{{%card}}', 'department');
        $this->dropColumn('{{%card}}', 'education_direction');
        $this->dropColumn('{{%card}}', 'specialty');
        $this->dropColumn('{{%card}}', 'creator');
        $this->dropColumn('{{%card}}', 'department_head');
    }
}
