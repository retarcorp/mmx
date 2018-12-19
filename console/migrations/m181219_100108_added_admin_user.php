<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m181219_100108_added_admin_user
 */
class m181219_100108_added_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'email' => 'admin@mmx.by',
            'password_hash' => Yii::$app->security->generatePasswordHash('adminadmin'),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
    }

}
