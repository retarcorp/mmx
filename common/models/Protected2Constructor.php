<?php

namespace common\models;

/**
 * This is the model class for table "protected_2_constructor".
 *
 * @property int $id
 * @property int $constructor_id
 * @property int $protected_id
 *
 * @property Constructor $constructor
 * @property ProtectedTable $protected
 */
class Protected2Constructor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protected_2_constructor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['constructor_id', 'protected_id'], 'required'],
            [['constructor_id', 'protected_id'], 'integer'],
            [['constructor_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Constructor::className(), 'targetAttribute' => ['constructor_id' => 'id']],
            [['protected_id'], 'exist', 'skipOnError' => true,
                'targetClass' => ProtectedTable::className(), 'targetAttribute' => ['protected_id' => 'id']],
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
            'protected_id' => 'Protected ID',
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
    public function getProtected()
    {
        return $this->hasOne(ProtectedTable::className(), ['id' => 'protected_id']);
    }
}
