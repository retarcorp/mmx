<?php

use yii\db\Migration;

/**
 * Class m181224_094853_create_table_products
 */
class m181224_094853_create_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'code' => $this->integer()->notNull(),
            'vendor_code' => $this->char(255)->notNull(),
            'product_name' => $this->text()->notNull(),
            'unit' => $this->char(255),
            'manufacturer' => $this->char(255),
            'price' => $this->float(),
            'availability' => $this->char(255),
            'delivery_time' => $this->char(255),
            'assembly_time' => $this->char(255),
            'status' => "enum('1','0') not null default '1'",
            'img' => $this->char(255),
            'img_title' => $this->char(255)
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }

}
