<?php

namespace common\models;

/**
 * This is the model class for table "socket_2_constructor".
 *
 * @property int $id
 * @property int $constructor_id
 * @property int $socket_id
 * @property int $count
 * @property Constructor $constructor
 * @property Socket $socket
 */
class Socket2Constructor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'socket_2_constructor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['constructor_id', 'socket_id', 'count'], 'required'],
            [['constructor_id', 'socket_id', 'count'], 'integer'],
            [['constructor_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Constructor::className(), 'targetAttribute' => ['constructor_id' => 'id']],
            [['socket_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Socket::className(), 'targetAttribute' => ['socket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'constructor_id' => 'Constructor ID',
            'socket_id' => 'Socket ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConstructor()
    {
        return $this->hasOne(Constructor::className(), ['id' => 'constructor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocket()
    {
        return $this->hasOne(Socket::className(), ['id' => 'socket_id']);
    }
}
