<?php

use yii\db\Migration;

/**
 * Class m190104_095318_drop_tables
 */
class m190104_095318_drop_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('constructor');
        $this->dropTable('socket');
        $this->dropTable('socket_2_constructor');
        $this->dropTable('protected');
        $this->dropTable('protected_2_constructor');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190104_095318_drop_tables cannot be reverted.\n";

        return false;
    }
}
