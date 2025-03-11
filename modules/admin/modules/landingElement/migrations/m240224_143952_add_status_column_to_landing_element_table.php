<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%landing_element}}`.
 */
class m240224_143952_add_status_column_to_landing_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%landing_element}}', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%landing_element}}', 'status');
    }
}
