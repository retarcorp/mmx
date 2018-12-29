<?php

use yii\db\Migration;

/**
 * Class m181228_124029_create_table_protected_2_conscructor
 */
class m181228_124029_create_table_protected_2_constructor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('protected_2_constructor', [
            'id' => $this->primaryKey(),
            'constructor_id'=> $this->integer()->notNull(),
            'protected_id'=> $this->integer()->notNull()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('protected_2_constructor');
    }

}
