<?php

use yii\db\Migration;

/**
 * Class m181228_122935_create_table_contsructor
 */
class m181228_122935_create_table_contsructor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('constructor', [
            'id' => $this->primaryKey(),
            'vendor_code'=> $this->text()->notNull(),
            'category'=> $this->text()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('constructor');
    }

}
