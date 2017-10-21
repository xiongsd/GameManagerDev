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
    <script type="text/javascript" src="<?=Url::to('@web/js/highcharts.js')?>"></script>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
    <div id="container" style="width: 90%; height: 80%; margin: 0 auto"></div>
    <script language="JavaScript">
    $(function() {
       var title = {
          text: '在线人数'   
       };
       var subtitle = {
          text: '2017年'
       };
       var xAxis = {
          categories: ['1月', '2月', '3月', '4月', '5月', '6月',
             '7月', '8月', '9月', '10月', '11月', '12月']
       };
       var yAxis = {
          title: {
             text: '人数'
          },
          labels:{
            step:1
          },
          plotLines: [{
             value: 0,
             width: 3,
             color: '#808080'
          }],

       };   

       var tooltip = {
          valueSuffix: '\xB0C'
       }

       var legend = {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle',
          borderWidth: 0,
       };

       var series =  [
          {
             name: '抚州麻将',
             data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,
                26.5, 23.3, 18.3, 13.9, 9.6]
          }, 
       ];

       var json = {};

       json.title = title;
       json.subtitle = subtitle;
       json.xAxis = xAxis;
       json.yAxis = yAxis;
       json.tooltip = tooltip;
       json.legend = legend;
       json.series = series;

       $('#container').highcharts(json);
    });


    </script>


  
</body>
</html>