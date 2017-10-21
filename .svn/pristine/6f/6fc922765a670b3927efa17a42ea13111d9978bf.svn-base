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
	   <script type="text/javascript">
			function checkParamValid(){
				if($("#targetId").val() == ""){
					$.messager.show({
					 title : '提示',
					 msg : '充值目标ID不能为空'
					});
					return false;
				}
				if($("#cardNum").val() == ""){
					$.messager.show({
					 title : '提示',
					 msg : '数量不能为空'
					 });
					 return false;
				}
				if($("#money").val() == ""){
					$.messager.show({
					 title : '提示',
					 msg : '实收现金不能为空'
					 });
					 return false;
				}

				return true;
			
			
			
			
			}


			function submit(){

				 if(!checkParamValid()){
					return false;	
				 }
				 if(confirm("确定要给"+$("#targetId").val()+"充值吗？")){
						 $.ajax({
						 url:'<?=Url::to(["trade/recharge"])?>',
						 data:{targetId:$("#targetId").val(),cardNum:$("#cardNum").val(),money:$("#money").val()},
						 type : 'get',		 
						 dataType : 'json',
						 success : function(r){
							 if (r.flag == "success"){		
								 $.messager.show({
									 title : '提示',
									 msg : '游戏用户'+r.data.actor_id+",当前房卡数为"+r.data.total_card_count
								 });
							 }else{
								 $.messager.show({
									 title : '提示',
									 msg : r.errMsg
								 });
							 } 
						  }

					   });
				 }
			}


			function reset(){
				$("#targetId").val("");
				$("#cardNum").val("");
				$("#money").val("");
			
			}



	   </script>
       <table style="width:500px;">
			<tr><td style="width:40%">充值ID</td><td style="width:60%"><input type="text" id="targetId" name="targetId" /></td></tr>
			<tr><td style="width:40%">房卡数</td><td style="width:60%"><input type="text" id="cardNum" name="cardNum" /></td></tr>
			<tr><td style="width:40%">实收现金</td><td style="width:60%"><input type="text" id="money" name="money" /></td></tr>
			<tr><td style="text-align:right"><input type="submit" name="submit" onclick="submit()" value="充值"/></td><td style="text-align:left"><input type="button" name="reset" value="重置" onclick="reset()"/></td></tr> 
		
		</table>
</body>
</html>