<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test}}`.
 */
class m250310_095814_add_start_at_column_to_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%test}}', 'started_at', $this->datetime()->defaultValue(date('Y-m-d H:i:s')));
        $this->addColumn('{{%test}}', 'ended_at', $this->datetime()->defaultValue(date('Y-m-d H:i:s', strtotime("+2 day"))));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%test}}', 'started_at');
        $this->dropColumn('{{%test}}', 'ended_at');
    }
}
