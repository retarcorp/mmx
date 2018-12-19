<?php

namespace common\models;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $article
 * @property string $img
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'article', 'img'], 'required'],
            [['article'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'article' => 'Article',
            'img' => 'Img',
        ];
    }
}
