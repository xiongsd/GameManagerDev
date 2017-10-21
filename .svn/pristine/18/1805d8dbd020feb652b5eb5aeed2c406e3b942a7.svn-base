<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=Url::to('@web/css/login.css')?>" rel="stylesheet" type="text/css" />
    <?= Html::csrfMetaTags() ?>
    <title>登录</title>
</head>
<script type="text/javascript">
	if (window != top){
		top.location.href = location.href; 
	}  
	 

</script>
<body>
<div id="login">  
    <h2>晓游游戏后台管理系统</h2>  
    <form  method="post" action="<?=Url::toRoute(['site/login'])?>">  
    	<input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
        <input id="loginform-username" type="text" required="required" placeholder="用户名" name="LoginForm[username]"></input>  
        <input id="loginform-password" type="password" required="required" placeholder="密码" name="LoginForm[password]"></input>
        <?= Html::errorSummary($model) ?>
        <button class="but" type="submit">登录</button>  
    </form>  
</div>  