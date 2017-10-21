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
use common\models\HttpUtils;
use frontend\models\UserService;
use frontend\models\TradeService;

use Head\NetMsg;
use Manager\Cmd;
use Manager\B2M_Recharge_Request;
use Manager\M2B_Recharge_Response;
use Manager\B2M_SendReceiveCard_Request;
use Manager\M2B_SendReceiveCard_Response;
use Manager\B2M_RetriveSendCardRecord_Request;
use Manager\M2B_RetriveSendCardRecord_Response;
use Manager\B2M_RetriveReceiveCardRecord_Request;
use Manager\M2B_RetriveReceiveCardRecord_Response;
use Manager\B2M_GetMallItems_Request;
use Manager\M2B_GetMallItems_Response;
use Manager\B2M_RequestRechargeId_Request;
use Manager\M2B_RequestRechargeId_Response;

//支付
use pay\config\config;
use pay\libs\Utils;
use pay\libs\RequestHandler;
use pay\libs\ClientResponseHandler;
use pay\libs\PayHttpClient;



/**
 * 交易管理
 */
class TradeController extends Controller
{
    public $enableCsrfValidation = false;
	private $resHandler = null;
    private $reqHandler = null;
    private $pay = null;
    private $cfg = null;
	/**
	 * 充值操作
	 */
    public function actionRecharge(){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_Recharge_Request;
        $req = new B2M_Recharge_Request();
        //获取actorid
       // $actorid = SysUtils::getValueBySessionKey('actorid');
        $req->setActorId(193634304);
        $req->setAddCardCount(100);    
        $req->setOperatorId(1263190016);
        $req->setMoney(100);    
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === false){

            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '服务器通讯失败'
                ]);
        }
        $resp = new M2B_Recharge_Response();
        $errorCode = 0;
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
        if($errorCode > 0){
             return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);

        }

    }
    /**
     * 房卡赠送
     */
    public function actionCardRollout(){

    	$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_SendReceiveCard_Request;
        $req = new B2M_SendReceiveCard_Request();
        $actorid = SysUtils::getValueBySessionKey('actorid');
        $req->setActorId($actorid);
        $req->setTargetActorId($_GET['target_actor_id']);
        $req->setCardCount($_GET['card_count']);

        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === false){
            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '请求超时'
                ]);
        }
		
        $resp = new M2B_SendReceiveCard_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
        	return json_encode(['cardcount'=>$resp->getCardCount()]);
        }else{
			//FILE_PUT_CONTENTS("/var/www/html/1.txt",$errorCode,FILE_APPEND);
        	return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
        }
    }
    /**
     * 获取转出明细
     */
    public function actionRetriveSendcardRecord(){
     	$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_RetriveSendCardRecord_Request;
        $req = new  B2M_RetriveSendCardRecord_Request();
        $req->setPage($_GET['page']);
        $actorid = SysUtils::getValueBySessionKey('actorid');
        $req->setActorId($actorid);
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        if($respMsgStream === false){
            return json_encode([
                    'retCode' => 1,
                    'retMsg' => '请求超时'
                ]);
        }
        $resp = new  M2B_RetriveSendCardRecord_Response();
        $errorCode = 0;
        $sendData = [];
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
        	foreach($resp->getSendCardRecords() as $value){
                $arr = [
                    'actorid'   => $value->getReceiverActorId(),
                    'cardcount' => $value->getCardCount(),
                    'nickname'  => $value->getNickName(),
                    'time'      => $value->getTimestamp()
                ];
                array_push($sendData, $arr);    
    	   }
        }else{
        	return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
        }  
        return json_encode($sendData); 	
    }
     

        /**
     * 获取交易明细
     */
    public function actionViewTradeItems(){

        return $this->renderPartial("viewdonateitems");
        
    }



	public function actionPayHandler(){

		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_RequestRechargeId_Request;
        $req = new B2M_RequestRechargeId_Request();
		//设置参数

		$actorid = SysUtils::getValueBySessionKey('actorid');
		$req->setActorId($actorid);
		$req->setAddCardCount($_GET['cardcount']);
		$req->setOperatorId($actorid);
		$req->setMoney($_GET['money']);
		$req->setChannel(1);
		$req->setItem($_GET['id']);
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
         if($respMsgStream === false){
            return json_encode([
                    'errCode' => 1,
                    'retMsg' => '请求超时'
                ]);
        }
        $resp = new M2B_RequestRechargeId_Response();
        $errorCode = 0;
        $result = [];
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			 $result['actorId'] = $resp->getActorId();
			 $result['orderId'] = $resp->getId();
		}else{
			return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
		}
		$this->resHandler = new ClientResponseHandler();
        $this->reqHandler = new RequestHandler();
        $this->pay = new PayHttpClient();
        $this->cfg = new Config();


        $this->reqHandler->setGateUrl($this->cfg->C('url'));
        $this->reqHandler->setKey($this->cfg->C('key'));

        $cardcount = $_GET['cardcount'];
		        

		$orderId = $result['orderId'];
		$id = $_GET['id'];
		$wxUserInfo = SysUtils::getValueBySessionKey('wxUserInfo');
		$actorid = SysUtils::getValueBySessionKey('actorid');
        $this->reqHandler->setParameter("out_trade_no",$result['orderId']);
		$this->reqHandler->setParameter("body",'购买房卡');
		$this->reqHandler->setParameter("mch_create_ip",'127.0.0.1');
		$this->reqHandler->setParameter("total_fee",$_GET['money']);
        $this->reqHandler->setParameter('service','pay.weixin.jspay');//接口类型：pay.weixin.jspay
        $this->reqHandler->setParameter('mch_id',$this->cfg->C('mchId'));//必填项，商户号，由威富通分配
        $this->reqHandler->setParameter('version',$this->cfg->C('version'));
		$this->reqHandler->setParameter('sub_openid',$wxUserInfo['openid']); 
		$this->reqHandler->setParameter('attach',"$cardcount,$orderId,$id,$actorid");
        //通知地址，必填项，接收威富通通知的URL，需给绝对路径，255字符内格式如:http://wap.tenpay.com/tenpay.asp
        $notify_url = 'http://'.$_SERVER['HTTP_HOST'];
        $this->reqHandler->setParameter('notify_url',$notify_url.'/GameManager/frontend/web/index.php?r=trade/pay-call-back');
		$this->reqHandler->setParameter('callback_url','http://www.xiaoyougames.com/GameManager/frontend/web/index.php?r=apply/go-agent-backend');
        $this->reqHandler->setParameter('nonce_str',mt_rand(time(),time()+rand()));//随机字符串，必填项，不长于 32 位
        $this->reqHandler->createSign();//创建签名
        
        $data = Utils::toXml($this->reqHandler->getAllParameters());
		//FILE_PUT_CONTENTS("log.txt",$data,FILE_APPEND);
        $this->pay->setReqContent($this->reqHandler->getGateURL(),$data);
        if($this->pay->call()){
            $this->resHandler->setContent($this->pay->getResContent());
            $this->resHandler->setKey($this->reqHandler->getKey());
            if($this->resHandler->isTenpaySign()){
                //当返回状态与业务结果都为0时才返回支付二维码，其它结果请查看接口文档
                if($this->resHandler->getParameter('status') == 0 && $this->resHandler->getParameter('result_code') == 0){
					File_put_contents('log.txt',"x",FILE_APPEND);
                    echo json_encode(array('token_id'=>$this->resHandler->getParameter('token_id')));
                    exit();
                }else{
					File_put_contents('log.txt',"xX",FILE_APPEND);
                    echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('err_code').' Error Message:'.$this->resHandler->getParameter('err_msg')));
                    exit();
                }
            }
			File_put_contents('log.txt',"xXX",FILE_APPEND);
            echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('status').' Error Message:'.$this->resHandler->getParameter('message')));
        }else{
			File_put_contents('log.txt',"xXXX",FILE_APPEND);
            echo json_encode(array('status'=>500,'msg'=>'Response Code:'.$this->pay->getResponseCode().' Error Info:'.$this->pay->getErrInfo()));
        }
	
	
	
	
	}

	public function actionGetMallItems(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_GetMallItems_Request;
        $req = new  B2M_GetMallItems_Request();
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
         if($respMsgStream === false){
            return json_encode([
                    'errCode' => 1,
                    'retMsg' => '请求超时'
                ]);
        }
        $resp = new M2B_GetMallItems_Response();
        $errorCode = 0;
		$mallItems = [];
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			foreach($resp->getMallItem() as $value){
				 $arr = [
                    'id'   => $value->getId(),
                    'cardcount' => $value->getCardCount(),
                    'money'  => $value->getMoney(),
                    'desc'      => $value->getDesc()
                ];
				 array_push($mallItems,$arr);
			}			
			
		}else{
			return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
		}
		return json_encode($mallItems);		
	}

	public function actionPayCallBack(){
		$this->resHandler = new ClientResponseHandler();
        $this->reqHandler = new RequestHandler();
        $this->pay = new PayHttpClient();
        $this->cfg = new Config();

        $this->reqHandler->setGateUrl($this->cfg->C('url'));
        $this->reqHandler->setKey($this->cfg->C('key'));
    
		$xml = file_get_contents('php://input');
        $this->resHandler->setContent($xml);
        $this->resHandler->setKey($this->cfg->C('key'));
        if($this->resHandler->isTenpaySign()){
            if($this->resHandler->getParameter('status') == 0 && $this->resHandler->getParameter('result_code') == 0){
				
				$t_fee = $this->resHandler->getParameter('total_fee');
				//附加参数
				$attach = explode(",",$this->resHandler->getParameter('attach'));
                //支付完成时间
				$pay_at = $this->resHandler->getParameter('time_end');
				//本地记录充值成功记录(发卡前)
				$t_fee = $this->resHandler->getParameter('total_fee');
				//订单流水号
				$orderid = $attach[1];
				//游戏ID
				$itemid = $attach[2];
				//购买房卡数
				$cardcount = $attach[0];
				//目标发卡actorid 
				$actorid = $attach[3];
				//支付日志
				$isNotWrite = TradeService::findWriteRechargeItem($orderid);
				if(isNotWrite){
					TradeService::toWriteRechargeItems($actorid,$actorid,$cardcount,$t_fee,$itemid,$orderid,$pay_at);

				}
				$cmd = new Cmd();
				$cmdCode = $cmd::CMD_B2M_Recharge_Request;
				$req = new B2M_Recharge_Request();
					
				$req->setActorId($attach[3]);
				$req->setAddCardCount($attach[0]);    
				$req->setOperatorId($attach[3]);
				$req->setMoney($t_fee);   
				$req->setChannel(1);  
				$req->setItem($attach[2]);  
				$req->setId($attach[1]);  
				$reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
				$respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
				if($respMsgStream === false){

					return json_encode([
							'retCode' => 1,
							'retMsg' => '服务器通讯失败'
						]);
				}
				$resp = new M2B_Recharge_Response();
				$errorCode = 0;
				if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
					echo 'success';
					exit();
				}else{
					 return json_encode([
							'retCode' => 2,
							'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
						]);

				}
                
            }else{
                echo 'failure';
                exit();
            }
        }else{
            echo 'failure';
        }
		
		
	}


	public function actionGenId(){
		$cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_RequestRechargeId_Request;
        $req = new B2M_RequestRechargeId_Request();
		//设置参数
//		$req->setActorId($_GET['actoryId']);
//		$req->setAddCardCount($_GET['cardCount']);
//		$req->setOperatorId($_GET['operatorId']);
//		$req->setMoney($_GET['money']);
		$req->setActorId(1271578624);
		$req->setAddCardCount(1);
		$req->setOperatorId(1271578624);
		$req->setMoney(1);
		$req->setChannel(1);
		$req->setItem(1);
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
         if($respMsgStream === false){
            return json_encode([
                    'errCode' => 1,
                    'retMsg' => '请求超时'
                ]);
        }
        $resp = new M2B_RequestRechargeId_Response();
        $errorCode = 0;
        $result = [];
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			 $result['actorId'] = $resp->getActorId();
			 $result['orderId'] = $resp->getId();
		}else{
			return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
		}
		echo $result['orderId'];
	
	
	
	
	}


	public function actionPay(){
	$cmd = new Cmd();
				$cmdCode = $cmd::CMD_B2M_Recharge_Request;
				$req = new B2M_Recharge_Request();
				$attach = explode(",","1,'a97da629b098b75c294dffdc3e463904',1,1259003904");	
				$req->setActorId(1259003904);
				$req->setAddCardCount(1);    
				$req->setOperatorId(1259003904);
				$req->setMoney(1);   
				$req->setChannel(1);  
				$req->setItem(1);  
				$req->setId('73278a4a86960eeb576a8fd4c9ec6997');  
				$reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
				$respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
				if($respMsgStream === false){

					return json_encode([
							'retCode' => 1,
							'retMsg' => '服务器通讯失败'
						]);
				}
				$resp = new M2B_Recharge_Response();
				$errorCode = 0;
				if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
					echo "ok";
				}else{
					 return json_encode([
							'retCode' => 2,
							'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
						]);

				}
	}

    
}
