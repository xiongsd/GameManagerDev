<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


use common\models\HttpUtils;
use common\models\SysUtils;


use Manager\Cmd;
use Head\NetMsg;
use Manager\B2M_TodayRecharge_Request;
use Manager\M2B_TodayRecharge_Response;

use Manager\B2M_MonthRecharge_Request;
use Manager\M2B_MonthRecharge_Response;

use Manager\B2M_MonthPre1Recharge_Request;
use Manager\M2B_MonthPre1Recharge_Response;
use Manager\B2M_AllRecharge_Request;
use Manager\M2B_AllRecharge_Response;
use Manager\B2M_GetAgentCount_Request;
use Manager\M2B_GetAgentCount_Response;
use Manager\B2M_GetRecentCreateRoom_Request;
use Manager\M2B_GetRecentCreateRoom_Response;
/**
 * 实现共享功能;
 */
class UtilsController extends Controller
{
    /**
     * 本日业绩排名
     */
   public function actionGetTodayRechange(){

        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_TodayRecharge_Request;
        //
        $req = new B2M_TodayRecharge_Request();
        $req->setPage($_GET['page']);

		$gameid = SysUtils::getValueBySessionKey('gameid');

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;        
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);

        if($respMsgStream === null){

            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '服务器通讯失败'
                ]);
        }
        
        $resp = new M2B_TodayRecharge_Response();
        $errorCode = 0;
        $rankData = [];
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);

        if($errorCode>0){
            return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);

        }

        foreach($resp->getRecharges() as $value){
            $data = [
                'rank'       => $value->getRank(),
                'getactorid' => $value->getActorId(),
                'cardcount'  => $value->getCardCount(),
                'money'      => $value->getMoney()
            ];
            array_push($rankData,$data);

        }
        return json_encode($rankData);

   }

    /**
     * 本月业绩排名
     */
    public function actionGetMonthRechange(){

        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_MonthRecharge_Request;
        //
        $req = new B2M_MonthRecharge_Request();
        $req->setPage($_GET['page']);
		$gameid = SysUtils::getValueBySessionKey('gameid');

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);

        $resp = new M2B_MonthRecharge_Response();
        $errorCode = 0;
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
         if($errorCode>0){
            return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);

        }

        $rankData = [];
        foreach($resp->getRecharges() as $value){
            $data = [
                'rank'       => $value->getRank(),
                'getactorid' => $value->getActorId(),
                'cardcount'  => $value->getCardCount(),
                'money'      => $value->getMoney()
            ];
            array_push($rankData,$data);

        }
        return json_encode($rankData);

   }
    /**
     * 上月业绩排名
     */
    public function actionGetPrevmonthRechange(){

        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_MonthPre1Recharge_Request;
        //
        $req = new B2M_MonthPre1Recharge_Request();
        $req->setPage($_GET['page']);

		$gameid = SysUtils::getValueBySessionKey('gameid');

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === null){

            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '服务器通讯失败'
                ]);
        }

        $resp = new M2B_MonthPre1Recharge_Response();
        $errorCode = 0;
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
        if($errorCode>0){
            return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);

        }
        $rankData = [];
        foreach($resp->getRecharges() as $value){
            $data = [
                'rank'       => $value->getRank(),
                'getactorid' => $value->getActorId(),
                'cardcount'  => $value->getCardCount(),
                'money'      => $value->getMoney()
            ];
            array_push($rankData,$data);

        }
        return json_encode($rankData);

   }
    /**
     * 累计业绩排名
     */
    public function actionGetAllRechange(){

        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_AllRecharge_Request;
        //
        $req = new B2M_AllRecharge_Request();
        $req->setPage($_GET['page']);

		$gameid = SysUtils::getValueBySessionKey('gameid');

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === null){

            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '服务器通讯失败'
                ]);
        }
        $resp = new M2B_AllRecharge_Response();
        $errorCode = 0;
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
        if($errorCode>0){
            return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);

        }
        $rankData = [];
        foreach($resp->getRecharges() as $value){
            $data = [
                'rank'       => $value->getRank(),
                'getactorid' => $value->getActorId(),
                'cardcount'  => $value->getCardCount(),
                'money'      => $value->getMoney()
            ];
            array_push($rankData,$data);

        }
        return json_encode($rankData);

   }

   public function actionGetAgentCount(){
	    $actorid = SysUtils::getValueBySessionKey('actorid');
        
	    $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetAgentCount_Request;
        //
        $req = new B2M_GetAgentCount_Request();
        $req->setActorId($actorid);


        $gameid = SysUtils::getValueBySessionKey('gameid');

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === null){

            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '服务器通讯失败'
                ]);
        }
        $resp = new M2B_GetAgentCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			$value = [
				'actorId' => $resp->getActorId(),
				'd1'      => $resp->getActorCountD1(),
				'd2'      => $resp->getActorCountD2(),
				'd7'	  => $resp->getActorCountD7(),
				'all'	  => $resp->getActorCountAll()		
			];

			return json_encode($value);
		
		}else{
			return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
		
		
		}
      
   
   
   }

   public function actionGetCreateRoomCount(){
        $actorid = SysUtils::getValueBySessionKey('actorid');
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetRecentCreateRoom_Request;        //
        $req = new B2M_GetRecentCreateRoom_Request();
        $req->setActorId($actorid);


        $gameid = SysUtils::getValueBySessionKey('gameid');

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === null){

            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '服务器通讯失败'
                ]);
        }
        $resp = new M2B_GetRecentCreateRoom_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			$items = [];
			foreach($resp->getRecentCreateRoom() as $value){
				$arr = [
					'id' => $value->getId(),
					'CreateTime'      => $value->getCreateTime(),
					'RoomId'      => $value->getRoomId(),
					'TimesType'	  => $value->getTimesType(),
					'PlayedTimes'	  => $value->getPlayedTimes(),		
					'Player1ActorId' => $value->getPlayer1ActorId(),
					'Player2ActorId'      => $value->getPlayer2ActorId(),
					'Player3ActorId'      => $value->getPlayer3ActorId(),
					'Player4ActorId'	  => $value->getPlayer4ActorId(),
					'Player1Scores'	  => $value->getPlayer1Scores(),
					'Player2Scores'	  => $value->getPlayer2Scores(),
					'Player3Scores'	  => $value->getPlayer3Scores(),
					'Player4Scores'	  => $value->getPlayer4Scores(),
					'ConsumeCardCount'	  => $value->getConsumeCardCount(),
					'Player1WxName'	  => $value->getPlayer1WxName(),
					'Player2WxName'	  => $value->getPlayer2WxName(),
					'Player3WxName'	  => $value->getPlayer3WxName(),
					'Player41WxName'	  => $value->getPlayer4WxName()
				];
				array_push($items,$arr);

			}
			return json_encode($items);		
		}else{
			return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
		
		
		}
   
   
   
   }


}
