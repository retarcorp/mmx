<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/common.css',
        'js/vendor/slick/slick.css',
        'js/vendor/slick/slick-theme.css'
    ];
    public $js = [
        'js/vendor/slick/slick.js',
        'js/common.js',
        'js/cart.js',
        'js/index.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
