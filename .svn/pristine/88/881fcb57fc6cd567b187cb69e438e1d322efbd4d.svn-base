<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use yii\helpers\Json;
use common\models\SysUtils;
use common\models\HttpUtils;


use Head\NetMsg;
use Manager\Cmd;
use Manager\B2M_Recharge_Request;
use Manager\M2B_Recharge_Response;


/**
 * 交易管理
 */
class TradeController extends Controller
{
	public function behaviors(){
			return [
				'access' => [
					'class' => AccessControl::className(),
					'only' => ['recharge'],
					'rules' => [

						[
							'allow' => true,
							'actions' => ['recharge'],
							'roles' => ['@']
						],
					]
				]

			];

    }
    public function actionRecharge(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_Recharge_Request;
        /**
         * 初始化充值请求;
         */
        $req = new B2M_Recharge_Request();
        $req->setActorId($_GET['targetId']);
        $req->setAddCardCount($_GET['cardNum']); 
		$req->setOperatorId(1271529488);
		$req->setMoney($_GET['money']);
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_Recharge_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
            return json_encode(['flag'=>'success',"data"=>['actor_id'=>$resp->getActorId(),'total_card_count'=>$resp->getTotalCardCount()]]);
        }else{
            return json_encode(['flag'=>'failure','errMsg'=>SysUtils::getErrorMsgByCode($errorCode)]);
		}


        

    }


    
    
}
