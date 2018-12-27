<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ContactsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/common.css',
    ];
    public $js = [

    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}