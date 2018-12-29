<?php

use yii\db\Migration;

/**
 * Class m181228_123425_create_table_socket
 */
class m181228_123425_create_table_socket extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('socket', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('socket');
    }

}
