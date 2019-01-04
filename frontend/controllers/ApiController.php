<?php

namespace frontend\controllers;

use common\models\Constructor;
use common\models\Products;
use Yii;
use yii\web\Controller;

class ApiController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionItems()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $get = Yii::$app->request->get();
        if (empty($get)) {
            $result = [];
            $data = Constructor::find()
                ->select(['*'])
                ->leftJoin('products', 'constructor.article = vendor_code')
                ->asArray()
                ->all();
            foreach ($data as $key => $item) {
                $result[$key]['article'] = $item['vendor_code'];
                $result[$key]['item_info'] = $item['product_name'];
                $result[$key]['calc'] = $item['json_name'];
            }

            return $result;
        }

        if (isset($get['calc'])) {
            if (file_exists(Yii::getAlias('@frontend') . '/web/json/' . $get['calc'])) {
                return json_decode(file_get_contents(Yii::getAlias('@frontend') . '/web/json/' . $get['calc']));
            } else {
                return null;
            }
        }
    }
}