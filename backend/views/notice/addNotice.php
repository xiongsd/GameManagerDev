<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 引入样式表 -->
    <link rel="stylesheet" type="text/css" href="<?=Url::to('@web/css/easyui/default/easyui.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=Url::to('@web/css/wu.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=Url::to('@web/css/icon.css')?>" />
    <!-- 引入js文件 -->
    <script type="text/javascript" src="<?=Url::to('@web/js/jquery-1.8.0.min.js')?>"></script>
    <script type="text/javascript" src="<?=Url::to('@web/js/easyui/jquery.easyui.min.js')?>"></script>
    <script type="text/javascript" src="<?=Url::to('@web/js/easyui/locale/easyui-lang-zh_CN.js')?>"></script>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
        <p style="font-size: 10pt;color:gray">活动内容</p>
        <p><input type="textarea" style="width:400px;height:100px" name="content"></p>

</body>
</html>