<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/sagar.css',
        'css/style.css',
        'css/jiwan.css',
       // 'css/bootstrap-social.css',
        'font-awesome/css/font-awesome.css',
        'css/payment.css',
        'css/kiran.css',
        'css/animate.css'

//        'css/site.min.css',
//        'css/sagar.min.css',
//        'css/style.min.css',
//        'css/jiwan.min.css',
//        'css/payment.min.css',
//        'css/kiran.min.css',
//        'css/bootstrap-social.css',
//        'font-awesome/css/font-awesome.css'
    ];
    public $js = [
        //'js/jquery.flip.min.js'
        'js/jquery.sticky-kit.min.js',
        'js/jquery.autocomplete.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
