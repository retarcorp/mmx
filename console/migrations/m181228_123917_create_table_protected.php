<?php

use yii\db\Migration;

/**
 * Class m181228_123917_create_table_protected
 */
class m181228_123917_create_table_protected extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('protected', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('protected');
    }

}
