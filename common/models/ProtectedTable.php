<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "protected".
 *
 * @property int $id
 * @property string $name
 *
 * @property Protected2Constructor[] $protected2Constructors
 */
class ProtectedTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protected';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Защиты',
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $model = Protected2Constructor::find()->where(['protected_id' => $this->id])->all();
        foreach ($model as $item) {
            $item->delete();
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtected2Constructors()
    {
        return $this->hasMany(Protected2Constructor::className(), ['protected_id' => 'id']);
    }
}
