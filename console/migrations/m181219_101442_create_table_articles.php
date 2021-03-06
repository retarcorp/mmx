<?php

use yii\db\Migration;

/**
 * Class m181219_101442_create_table_blog
 */
class m181219_101442_create_table_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(50)->notNull(),
            'article' => $this->text()->notNull(),
            'img' => $this->text()->notNull()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
    }

}
