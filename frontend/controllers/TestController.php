<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use yii\helpers\Json;
use common\models\SysUtils;
use common\models\UrlUtils;
use common\models\HttpUtils;

use frontend\models\UserService;
use frontend\models\UserModel;
use frontend\models\ApplyService;
use frontend\models\SysService;
use common\models\SmsSingleSender;


use Head\NetMsg;
use Manager\Cmd;
use Manager\B2M_Register_Request;
use Manager\M2B_Register_Response;
use Manager\B2M_RegisterAgent_Request;
use Manager\M2B_RegisterAgent_Response;
use Manager\B2M_FindRegisterAccount_Request;
use Manager\B2M_SearchAccount_Request;
use Manager\M2B_SearchAccount_Response;

/*
 * 测试
 */
class TestController extends Controller
{
   public $enableCsrfValidation = false;


   public function actionTestShort(){
	   $id = 431241421;
	   $arr = HttpUtils::getPromShortAddr($id);
	   echo $arr['url'];
      


    }



    
}
