<?php

namespace console\controllers;

use common\models\Products;
use yii\console\Controller;
class CronController extends Controller
{

    public function actionParseFile()
    {
        $model = new Products();
        $model->parseFile();
    }

}