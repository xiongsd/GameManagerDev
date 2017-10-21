<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use yii\helpers\Json;


/**
 * 主页管理
 */
class HomeCotroller extends Controller
{
   public function actionIndex(){
        return $this->render('index');
   }

}
