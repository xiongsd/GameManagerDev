<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use Head\NetMsg;
use Manager\Cmd;

use common\models\HttpUtils;
use Manager\B2M_SearchActor_Request;
use Manager\M2B_SearchActor_Response;
use Manager\B2M_GetTodayActiveUserCount_Request;
use Manager\M2B_GetTodayActiveUserCount_Response;
use Manager\B2M_GetTodayRoomCount_Request;
use Manager\M2B_GetTodayRoomCount_Response;
use Manager\B2M_GetTodayRechargeCardCount_Request;
use Manager\M2B_GetTodayRechargeCardCount_Response;
use Manager\B2M_GetTodayRechargeMoney_Request;
use Manager\M2B_GetTodayRechargeMoney_Response;
use Manager\B2M_GetTodayRechargeUserCount_Request;
use Manager\B2M_GetTodayNewUserCount_Request;
use Manager\M2B_GetTodayNewUserCount_Response;
use Manager\M2B_GetTodayRechargeUserCount_Response;
use Manager\B2M_GetHistoryActiveUserCount_Request;
use Manager\M2B_GetHistoryActiveUserCount_Response;
use Manager\B2M_GetHistoryConsumeCardCount_Request;
use Manager\M2B_GetHistoryConsumeCardCount_Response;
use Manager\M2B_GetHistoryNewUserCount_Response;
use Manager\B2M_GetHistoryNewUserCount_Request;
use Manager\M2B_GetHistoryRechargeCardCount_Response;
use Manager\B2M_GetHistoryRechargeCardCount_Request;
use Manager\M2B_GetHistoryRechargeMoney_Response;
use Manager\B2M_GetHistoryRechargeMoney_Request;
use Manager\B2M_GetHistoryRechargeUserCount_Request;
use Manager\M2B_GetHistoryRechargeUserCount_Response;
use Manager\B2M_GetHistoryRoomCount_Request;
use Manager\M2B_GetHistoryRoomCount_Response;
use Manager\B2M_GetLiuCun_Request;
use Manager\M2B_GetLiuCun_Response;
//use Manager\TodayRechargeCardCount;
/**
 * 实现管理功能;
 */
class ManagerController extends Controller
{
	public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['share-activity-switch','search-actor','get-active-user-count','get-today-room-count','get-today-recharge-card-count','get-today-recharge-money','get-today-new-user-count','get-today-recharge-user-count','get-history-active-user-count','get-history-consume-card-count','get-history-new-user-count','get-history-recharge-money','get-history-recharge-user-count','get-history-room-count','get-liu-cun'],
                'rules' => [

                    [
                        'allow' => true,
                        'actions' => ['share-activity-switch','search-actor','get-active-user-count','get-today-room-count','get-today-recharge-card-count','get-today-recharge-money','get-today-new-user-count','get-today-recharge-user-count','get-history-active-user-count','get-history-consume-card-count','get-history-new-user-count','get-history-recharge-money','get-history-recharge-user-count','get-history-room-count','get-liu-cun'],
                        'roles' => ['@']
                    ],
                ]
            ]

        ];

    }
    //分享活动开启;
    public function actionShareActivitySwitch(){

        $this->layout = false;
        return $this->render("activityswitch");
    }   


    //查找角色
    //
    // 
    public function actionSearchActor(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_SearchActor_Request;
        /**
         * 初始化;
         */
        $req = new B2M_SearchActor_Request();
        $req->setActorId(3);
        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_SearchActor_Response();
        $errorCode = 0;
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
        echo "actorId:".$resp->getActorName();
    } 
	//获取在线用户数
    public function actionGetActiveUserCount(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetTodayActiveUserCount_Request;
        /**
         * 初始化;
         */
        $req = new B2M_GetTodayActiveUserCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetTodayActiveUserCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			$index = [];
			$count = [];
			foreach($resp->getTodayActiveUserCount() as $value){
			    $minute = ($value->getIndex()%4)==0?"":($value->getIndex()%4*15)."分";
				array_push($index,floor($value->getIndex()/4)."时".$minute);
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['index'=>$index,'count'=>$count]]);
		

		}else{
		}
        
    } 

    //获取房间数
	public function actionGetTodayRoomCount(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetTodayRoomCount_Request;
        /**
         * 初始化;
         */
        $req = new B2M_GetTodayRoomCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetTodayRoomCount_Response();
        $errorCode = 0;
		if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			$index = [];
			$count = [];
			foreach($resp->getTodayRoomCount() as $value){
				$minute = ($value->getIndex()%4)==0?"":($value->getIndex()%4*15)."分";
				array_push($index,floor($value->getIndex()/4)."时".$minute);
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['index'=>$index,'count'=>$count]]);
		

		}else{
		}



        
    } 
    //CMD_B2M_GetTodayRechargeCardCount_Request
	public function actionGetTodayRechargeCardCount(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetTodayRechargeCardCount_Request;
        /**
         * 初始化;
         */
        $req = new B2M_GetTodayRechargeCardCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetTodayRechargeCardCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			$index = [];
			$count = [];
			foreach($resp->getTodayRechargeCardCount() as $value){
				$minute = ($value->getIndex()%4)==0?"":($value->getIndex()%4*15)."分";
				array_push($index,floor($value->getIndex()/4)."时".$minute);
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['index'=>$index,'count'=>$count]]);

		}else{
		}
        
    } 
	//CMD_B2M_GetTodayNewUserCount_Request
	public function actionGetTodayNewUserCount(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetTodayNewUserCount_Request;
        /**
         * 初始化;
         */
        $req = new B2M_GetTodayNewUserCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetTodayNewUserCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			$index = [];
			$count = [];
			foreach($resp->getTodayNewUserCount() as $value){
				$minute = ($value->getIndex()%4)==0?"":($value->getIndex()%4*15)."分";
				array_push($index,floor($value->getIndex()/4)."时".$minute);
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['index'=>$index,'count'=>$count]]);

		}else{
		}
        
    }
    //CMD_B2M_GetTodayRechargeMoney_Request
	public function actionGetTodayRechargeMoney(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetTodayRechargeMoney_Request;
        /**
         * 初始化;
         */
        $req = new B2M_GetTodayRechargeMoney_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetTodayRechargeMoney_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$index = [];
			$count = [];
			foreach($resp->getTodayRechargeMoney() as $value){
				$minute = ($value->getIndex()%4)==0?"":($value->getIndex()%4*15)."分";
				array_push($index,floor($value->getIndex()/4)."时".$minute);
				array_push($count,$value->getCount()/100);
			}

			return json_encode(['flag'=>'success','data'=>['index'=>$index,'count'=>$count]]);

		}else{
		}
        
    } 
    //CMD_B2M_GetTodayRechargeUserCount_Request
	public function actionGetTodayRechargeUserCount(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetTodayRechargeUserCount_Request;
        /**
         * 初始化;
         */
        $req = new B2M_GetTodayRechargeUserCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetTodayRechargeUserCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$index = [];
			$count = [];
			foreach($resp->getTodayRechargeUserCount() as $value){
				$minute = ($value->getIndex()%4)==0?"":($value->getIndex()%4*15)."分";
				array_push($index,floor($value->getIndex()/4)."时".$minute);
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['index'=>$index,'count'=>$count]]);

		}else{
		}
        
    }

    //B2M_GetHistoryActiveUserCount_Request
	public function actionGetHistoryActiveUserCount(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetHistoryActiveUserCount_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetHistoryActiveUserCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetHistoryActiveUserCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$count = [];
			foreach($resp->getHistoryActiveUserCount() as $value){

				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'count'=>$count]]);

		}else{
		}
	

	
	}
	    //B2M_GetHistoryConsumeCardCount
	public function actionGetHistoryConsumeCardCount(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetHistoryConsumeCardCount_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetHistoryConsumeCardCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetHistoryConsumeCardCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$count = [];
			foreach($resp->getHistoryConsumeCardCount() as $value){

				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'count'=>$count]]);

		}else{
		}
	

	
	}

	
		    //B2M_GetHistoryNewUserCount_Request
	public function actionGetHistoryNewUserCount(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetHistoryNewUserCount_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetHistoryNewUserCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetHistoryNewUserCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$count = [];
			foreach($resp->getHistoryNewUserCount() as $value){

				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'count'=>$count]]);

		}else{
		}
	

	
	}

	//B2M_GetHistoryRechargeMoney_Request
	public function actionGetHistoryRechargeMoney(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetHistoryRechargeMoney_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetHistoryRechargeMoney_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetHistoryRechargeMoney_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$count = [];
			foreach($resp->getHistoryRechargeMoney() as $value){

				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($count,$value->getCount()/100);
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'count'=>$count]]);

		}else{
		}

	}

				    //B2M_GetHistoryRechargeUserCount_Request
	public function actionGetHistoryRechargeUserCount(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetHistoryRechargeUserCount_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetHistoryRechargeUserCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetHistoryRechargeUserCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$count = [];
			foreach($resp->getHistoryRechargeUserCount() as $value){

				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'count'=>$count]]);

		}else{
		}

	}
				    //M2B_GetHistoryRoomCount_Response
	public function actionGetHistoryRoomCount(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetHistoryRoomCount_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetHistoryRoomCount_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetHistoryRoomCount_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$count = [];
			foreach($resp->getHistoryRoomCount() as $value){

				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($count,$value->getCount());
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'count'=>$count]]);

		}else{
		}

	}
					    //M2B_GetLiuCun_Response
	public function actionGetLiuCun(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetLiuCun_Request;

		/**
         * 初始化;
         */
        $req = new B2M_GetLiuCun_Request();

        
        // 制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        $resp = new M2B_GetLiuCun_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){

			$date = [];
			$d = [
				'd2'=>[],
				'd3'=>[],
				'd7'=>[],
				'd30'=>[]
			];
			foreach($resp->getLiuCun() as $value){
				array_push($date,date('Y-m-d', $value->getDay()/1000));
				array_push($d['d2'],$value->getD2());
				array_push($d['d3'],$value->getD3());
				array_push($d['d7'],$value->getD7());
				array_push($d['d30'],$value->getD30());
				
			}

			return json_encode(['flag'=>'success','data'=>['date'=>$date,'d'=>$d]]);

		}else{
		}

	}
}


