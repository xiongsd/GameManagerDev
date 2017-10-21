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
          text: '活跃用户数'   
       };
	   var myDate = new Date();

	   var yAxis = {
          title: {
             text: '人数'
          },
          labels:{
            step:1,

          },
				
          plotLines: [{
             value: 0,
             width: 3,
             color: '#808080'
          }],

       };   
	   var tooltip = {
		  valuePrefix: '当日',
          valueSuffix: '人'
       };
	   var legend = {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle',
          borderWidth: 0,
       };

	   function refresh(){
	    $.ajax({
			 url:'<?=Url::to(["manager/get-history-active-user-count"])?>',
			 type : 'get',		 
			 dataType : 'json',
			 success : function(r){
				 if (r.flag == "success"){	
					var xAxis = {
						title: {
						 text: '日期'
					  },
					  labels:{
						step:5
					  },
					  categories: r.data.date
				    };
					var series =  [
				    {
					 name: '宜黄麻将',
					 data: r.data.count
				     }, 
			        ];
					        var json = {};

					   json.title = title;
					   json.xAxis = xAxis;
					   json.yAxis = yAxis;
					   json.tooltip = tooltip;
					   json.legend = legend;
					   json.series = series;

					   $('#container').highcharts(json);
				 
					
				 }else{
					 $.messager.show({
						 title : '提示',
						 msg : r.errMsg
					 });
				 } 
			  }

		   });
	   }
	   refresh();
	   window.setInterval(refresh,900000);  


    });


    </script>


  
</body>
</html>