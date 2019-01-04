<?php

namespace common\models;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Yii;

/**
 * This is the model class for table "constructor".
 *
 * @property int $id
 * @property string $article
 * @property string $default_name
 * @property string $save_name
 * @property string $json_name
 */
class Constructor extends \yii\db\ActiveRecord
{
    const CONSTRUCTOR_FOLDER = 'constructor';

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
            [['default_name'], 'required'],
            [['save_name'], 'string'],
            [['article', 'json_name'], 'string', 'max' => 255],
            [['default_name'], 'file', 'extensions' => 'xls, xlsx', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article' => 'Артикул',
            'default_name' => 'Имя файла',
            'save_name' => 'Save Name',
            'json_name' => 'Json Name',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeDelete(): bool
    {
        $this->deleteFiles($this->save_name, $this->json_name);
        return parent::beforeDelete();
    }

    /**
     * Save images in folder
     *
     * @param $file
     * @return bool
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     * @throws \yii\base\Exception
     */
    public function upload($file): bool
    {
        if ($this->validate()) {
            $this->default_name = $file;
            $fileName = $this->getFileName() . '.' . $this->default_name->extension;
            $spreadsheet = IOFactory::load($this->default_name->tempName);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $this->json_name = $data[2][2] . '.json';
            $this->article = $data[2][2];
            $this->generateJson($data);
            $this->default_name->saveAs($this->getFullPathTofile($fileName));
            $this->default_name = $this->default_name->name;
            $this->save_name = $fileName;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     */
    private function getFileName(): string
    {
        return Yii::$app->security->generateRandomString() . time();
    }

    /**
     * @param $fileName
     * @return string
     */
    public static function getPathImg($fileName): string
    {
        return '/uploads/' . self::CONSTRUCTOR_FOLDER . '/' . $fileName;
    }

    /**
     * Delete img from folder
     *
     * @param $fileName
     * @return string
     */
    private function deleteFiles($fileName, $json)
    {
        @unlink($this->getFullPathTofile($fileName));
        @unlink(Yii::getAlias('@frontend') . '/web/json/' . $json);
    }

    /**
     * @param $fileName
     * @return string
     */
    private function getFullPathTofile($fileName): string
    {
        return Yii::getAlias('@frontend') . '/web' . self::getPathImg($fileName);
    }

    private function generateJson($data)
    {
        $result = [];
        $keysSocket = [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $keysProtected = [15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29];

        foreach ($keysSocket as $key => $value) {
            ;
            if ($data[$value][6] == true) {
                $result['sockets'][$key]['title'] = $data[$value][3];
                $result['sockets'][$key]['size'] = $data[$value][5];
                $result['sockets'][$key]['price'] = $data[$value][16];
                $result['sockets'][$key]['article'] = $data[$value][2];
            }
        }

        foreach ($keysProtected as $key => $value) {
            if ($data[$value][6] == true) {
                $result['protected'][$key]['title'] = $data[$value][3];
                $result['protected'][$key]['size'] = $data[$value][5];
                $result['protected'][$key]['price'] = $data[$value][16];
                $result['protected'][$key]['article'] = $data[$value][2];
            }
        }
        $result['modules'] = $data[42][6];
        $result['units'] = $data[43][6];
        $result['price'] = $data[41][4];

        $product = Products::find()->where(['vendor_code' => $data[2][2]])->one();
        if (!empty($product)) {
            $result['img'] = "uploads/1C/" . $product->img;
        } else {
            $result['img'] = null;
        }
        $fileName = Yii::getAlias('@frontend') . '/web/json/' . $data[2][2] . '.json';
        $fp = fopen($fileName, 'w');
        fwrite($fp, json_encode($result));
        fclose($fp);

    }
}
