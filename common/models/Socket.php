<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "socket".
 *
 * @property int $id
 * @property string $title
 *
 * @property Socket2Constructor[] $socket2Constructors
 */
class Socket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'socket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $model = Socket2Constructor::find()->where(['socket_id' => $this->id])->all();
        foreach ($model as $item) {
            $item->delete();
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocket2Constructors()
    {
        return $this->hasMany(Socket2Constructor::className(), ['socket_id' => 'id']);
    }
}
