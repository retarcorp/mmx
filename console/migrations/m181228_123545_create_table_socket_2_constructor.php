<?php

use yii\db\Migration;

/**
 * Class m181228_123545_create_table_socket_2_constructor
 */
class m181228_123545_create_table_socket_2_constructor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('socket_2_constructor', [
            'id' => $this->primaryKey(),
            'constructor_id' => $this->integer()->notNull(),
            'socket_id' => $this->integer()->notNull(),
            'count'=> $this->integer()->notNull()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('socket_2_constructor');
    }


}
