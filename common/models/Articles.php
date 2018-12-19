<?php

namespace common\models;

use Yii;

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
    const ARTICLES_FOLDER = 'articles';

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'article',], 'required'],
            [['article'], 'string'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'article' => 'Статья',
            'img' => 'Картинка',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeDelete(): bool
    {
        $this->deleteImg($this->img);
        return parent::beforeDelete();
    }

    /**
     * Save images in folder
     *
     *  * @param null $img
     * @return bool
     * @throws \yii\base\Exception
     */
    public function upload($img = null): bool
    {
        if ($img !== null && $this->validate()) {
            $this->deleteImg($this->img);
            $this->img = $img;
            $imgName = $this->getImgName() . '.' . $this->img->extension;
            $this->img->saveAs($this->getFullPathImg($imgName));
            $this->img = $imgName;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     */
    private function getImgName(): string
    {
        return Yii::$app->security->generateRandomString() . time();
    }

    /**
     * @param $imgName
     * @param $extension
     * @return string
     */
    public static function getPathImg($imgName): string
    {
        return '/uploads/' . self::ARTICLES_FOLDER . '/' . $imgName;
    }

    /**
     * Delete img from folder
     *
     * @param $imgName
     * @return string
     */
    private function deleteImg($imgName)
    {
        @unlink($this->getFullPathImg($imgName));
    }

    /**
     * @param $imgName
     * @return string
     */
    private function getFullPathImg($imgName): string
    {
        return Yii::getAlias('@frontend') . '/web' . self::getPathImg($imgName);
    }
}
