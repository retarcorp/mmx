<?php

namespace common\models;
/**
 * This is the model class for table "constructor".
 *
 * @property int $id
 * @property string $vendor_code
 * @property string $category
 *
 * @property Protected2Constructor[] $protected2Constructors
 * @property Socket2Constructor[] $socket2Constructors
 */
class Constructor extends \yii\db\ActiveRecord
{
    const CATEGORY_ARRAY = [
        1 => 'Стационарное',
        2 => 'Переносное',
        3 => 'Стационарное прорезиненное',
        4 => 'Переносное из стеклоплатстика',
        5 => 'Переносное прорезиненное',
        6 => 'Стационарное из пластика'
    ];

    public $socket;
    public $socketCount;
    public $protectedName;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'constructor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vendor_code', 'category', 'socket'], 'required'],
            [['vendor_code', 'category'], 'string'],
            [['socket', 'socketCount', 'protectedName'], 'each', 'rule' => ['integer']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor_code' => 'Артикул',
            'category' => 'Категория',
            'socket' => 'Розетка',
            'socketCount' => 'Количество',
            'protectedName' => 'Защиты'
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this->isNewRecord) {
                $model = Socket2Constructor::find()->where(['constructor_id' => $this->id])->all();
                foreach ($model as $item) {
                    $item->delete();
                }
                $protected = Protected2Constructor::find()->where(['constructor_id' => $this->id])->all();
                foreach ($protected as $item) {
                    $item->delete();
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $result = [];

        foreach ($this->socket as $key => $item) {
            if (!array_key_exists($item, $result)) {
                $result[$item] = $this->socketCount[$key];
            } else {
                $result[$item] = $result[$item] + $this->socketCount[$key];
            }
        }

        foreach ($result as $key => $item) {
            $model = new Socket2Constructor();
            $model->count = $item;
            $model->constructor_id = $this->id;
            $model->socket_id = $key;
            $model->save();
        }

        foreach ($this->protectedName as $key => $item) {
            if ($item === '1') {
                $model = new Protected2Constructor();
                $model->protected_id = $key;
                $model->constructor_id = $this->id;
                $model->save();
            }
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $model = Socket2Constructor::find()->where(['constructor_id' => $this->id])->all();
        foreach ($model as $item) {
            $item->delete();
        }
        $protected = Protected2Constructor::find()->where(['constructor_id' => $this->id])->all();
        foreach ($protected as $item) {
            $item->delete();
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtected2Constructors()
    {
        return $this->hasMany(Protected2Constructor::className(), ['constructor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocket2Constructors()
    {
        return $this->hasMany(Socket2Constructor::className(), ['constructor_id' => 'id']);
    }

    public function getSockets()
    {
        return $this->hasMany(Socket::class, ['id' => 'socket_id'])
            ->viaTable(Socket2Constructor::tableName(), ['constructor_id' => 'id']);
    }

    public function getProtected()
    {
        return $this->hasMany(ProtectedTable::class, ['id' => 'protected_id'])
            ->viaTable(Protected2Constructor::tableName(), ['constructor_id' => 'id']);
    }
}
