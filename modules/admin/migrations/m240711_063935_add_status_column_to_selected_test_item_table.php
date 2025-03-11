<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%selected_test_item}}`.
 */
class m240711_063935_add_status_column_to_selected_test_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%selected_test_item}}', 'status', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%selected_test_item}}', 'status');
    }
}
