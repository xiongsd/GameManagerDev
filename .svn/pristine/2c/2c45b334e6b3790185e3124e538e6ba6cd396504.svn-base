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
		   var chart = {
      type: 'spline'      
   }; 
	  var subtitle = {
      text: 'source:www.xiaoyougames.com'
   };
	   var title = {
          text: '留存图'   
       };
	   var myDate = new Date();

	   var yAxis = {
		  title: {
			 text: '百分比'
		  },
		  max:1,
		  min:0,
			  tickInterval:0.1,
		  labels: {//y轴刻度文字标签  
                        formatter: function () {  
                            return this.value*100 + '%';//y轴加上%  
                        }  
                    }
					


       };
	   var tooltip = {
          pointFormatter: function() {
				return (this.y*100).toFixed(2)+"%"
		  }

		  
       };
	   var plotOptions = {
		  spline: {
			 marker: {
				radius: 4,
				lineColor: '#666666',
				lineWidth: 1
			 }
		  }
	   };

	   
	   function refresh(){
	    $.ajax({
			 url:'<?=Url::to(["manager/get-liu-cun"])?>',
			 type : 'get',		 
			 dataType : 'json',
			 success : function(r){
				 if (r.flag == "success"){	
					var xAxis = {
						title: {
						 text: '日期'
					  },
					  categories: r.data.date
				    };
					var series =  [
						{
							 name: '次日留存',
							 marker: {
								symbol: 'square'
							 },
						     data:r.data.d.d2
						},
						{
								 name: '三日留存',
							 marker: {
								symbol: 'square'
							 },
						     data:r.data.d.d3
						},
						{
								 name: '七日留存',
							 marker: {
								symbol: 'diamond'
							 },
						     data:r.data.d.d7
						},
						{
							 name: '月留存',
							 marker: {
								symbol: 'diamond'
							 },
						     data:r.data.d.d30
						}
			        ];
				   var json = {};
				   json.chart = chart;
				   json.title = title;
				   json.subtitle = subtitle;
				   json.tooltip = tooltip;
				   json.xAxis = xAxis;
				   json.yAxis = yAxis;  
				   json.series = series;
				   json.plotOptions = plotOptions;
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