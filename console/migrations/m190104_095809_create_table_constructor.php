<?php

use yii\db\Migration;

/**
 * Class m190104_095809_create_table_constructor
 */
class m190104_095809_create_table_constructor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('constructor', [
            'id' => $this->primaryKey(),
            'article' => $this->char(255)->notNull(),
            'default_name' => $this->text()->notNull(),
            'save_name' => $this->text()->notNull(),
            'json_name' => $this->char(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('constructor');
    }

}
