<?php

namespace common\models;

use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\CSVReader;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $code
 * @property string $vendor_code
 * @property string $product_name
 * @property string $unit
 * @property string $manufacturer
 * @property int $price
 * @property string $availability
 * @property string $delivery_time
 * @property string $assembly_time
 * @property string $status
 * @property string $img
 * @property string $img_title
 */
class Products extends \yii\db\ActiveRecord
{
    const FOLDER_1C = '1C';
    const STATUS_ACTIVE = '0';
    const STATUS_NONACTIVE = '1';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'vendor_code', 'product_name', 'img'], 'required'],
            [['code', 'id'], 'integer'],
            [['product_name', 'status'], 'string'],
            [['vendor_code', 'unit', 'manufacturer', 'availability', 'delivery_time', 'assembly_time', 'img', 'img_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'vendor_code' => 'Артикул ',
            'product_name' => 'Наименование',
            'unit' => 'Ед. измерения',
            'manufacturer' => 'Производитель',
            'price' => 'Цена',
            'availability' => 'Остаток',
            'delivery_time' => 'Срок поставки',
            'assembly_time' => 'Срок сборки',
            'status' => 'Отображать на сайте',
            'img' => 'Папка с картинкой',
            'img_title' => 'Заголовок картинки',
        ];
    }

    public function parseFile()
    {
        $path = Yii::getAlias('@frontend') . '/web/uploads/' . self::FOLDER_1C . '/exp_22.12.2018.csv';

        $importer = new CSVImporter();
        $importer->setData(new CSVReader([
            'filename' => $path,
            'fgetcsvOptions' => [
                'delimiter' => ';'
            ]
        ]));

        $data = $importer->getData();

        Yii::$app->db->createCommand()->truncateTable(self::tableName())->execute();

        foreach ($data as $item) {
            if ($item[0] !== '47098' && $item[0] !== '46755' && $item[0] !== '46004') {
                $model = new self();
                $model->code = $item[0];
                $model->vendor_code = $this->getUTF8Encode($item[1]);
                $model->product_name = (string)$this->getUTF8Encode($item[2]);
                $model->unit = isset($item[3]) ? $this->getUTF8Encode($item[3]) : null;
                $model->manufacturer = isset($item[4]) ? $this->getUTF8Encode($item[4]) : null;
                $model->price = isset($item[5]) ? $item[5] : null;
                $model->availability = isset($item[6]) ? $this->getUTF8Encode($item[6]) : null;
                $model->delivery_time = isset($item[7]) ? $item[7] : null;
                $model->assembly_time = isset($item[8]) ? $item[8] : null;
                $model->status = isset($item[9]) ? $item[9] : null;;
                $model->img = isset($item[10]) ? $item[10] : null;
                $model->img_title = isset($item[11]) ? $this->getUTF8Encode($item[11]) : null;
                if (!$model->save()) {
                    var_dump($model->errors);
                };
            }
        }

        return 'Done!';
    }

    private function getUTF8Encode($value)
    {
        return mb_convert_encoding($value, 'UTF-8', 'windows-1251');
    }

    public function sendEmailOrder($text)
    {
        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom('no-replay@witm.by')
            ->setSubject('Заказ с сайта')
            ->setTextBody($text)
            ->send();
    }
}
