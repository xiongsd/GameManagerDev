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
        
        'css/ionic/ionic.css',
        'css/ionic/ionicons.min.css',
        'css/site.css'

    ];
    public $js = [
  //      'js/angular.min.js',
        'js/ionic/ionic.bundle.min.js',
        'js/ionic-datepicker.bundle.min.js',
        'js/app.js'
        
    ];
    public $depends = [
//        'yii\web\YiiAsset',
    ];
    public $jsOptions = [  
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置  
    ];  
}
