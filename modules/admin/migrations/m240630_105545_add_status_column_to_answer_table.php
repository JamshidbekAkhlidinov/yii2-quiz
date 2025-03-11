<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%answer}}`.
 */
class m240630_105545_add_status_column_to_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%answer}}',
            'status',
            $this->integer()
                ->defaultValue(1)
                ->after('correct_answer')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%answer}}', 'status');
    }
}
