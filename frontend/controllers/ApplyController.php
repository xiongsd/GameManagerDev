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




/**
 * 代理商申请与查询
 */
class ApplyController extends Controller
{
    /**
     * 进入主页
     *
     * @return mixed
     */
    private function index(){
        return $this->render('index');
    }

    /**
     * 注册代理;
   */
    public function actionRegisterAgent(){
		
        $wxUserInfo = SysUtils::getValueBySessionKey('wxUserInfo');
        if(isset($wxUserInfo)){
            $unionid = $wxUserInfo['unionid'];
            $openid = $wxUserInfo['openid'];
        }else{
            return $this->redirect(UrlUtils::createUrl(["user/get-auth",'a'=>1]));
        }
        $verfiyTelCode = $_GET['verifytelcode'];
		$gameid = $_GET['gameid'];
        $isSuccess = UserService::checkAuthVerify($_GET['telephone'],$verfiyTelCode);
        if($isSuccess===false){
             return json_encode(['retcode'=>3,'msg'=>'验证码失效或错误']);
        }
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_RegisterAgent_Request;
        /**
         * 注册后台账号;
         */

		$telephone = $_GET['telephone'];
		$nickname = $_GET['nickname'];
		$wxid = $_GET['wxid'];
        $req = new B2M_RegisterAgent_Request();
        $req->setUnionId($unionid);
        $req->setOpenId($openid);
        $req->setPhone($telephone);
        $req->setName($nickname);
		$req->setWxId($wxid);
		$req->setAccountId($_GET['accountid']);


        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);

        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);

        $resp = new M2B_RegisterAgent_Response();
        $errorCode = 0;
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)){
			return json_encode([
                    'retCode' => 1,
                    'retMsg' => '成功注册'
                ]);


        }else{
            return json_encode([
                    'retCode' => 2,
                    'retMsg' => SysUtils::getErrorMsgByCode($errorCode)
                ]);
        }
        

    }
	//进入代理申请
	public function actionGoAgentReq(){
		if(isset($_GET['gameid'])){
			$gameid = $_GET['gameid'];		
		}else{
			$gameid = SysUtils::getValueBySessionKey('gameid');
		}
		SysService::setGameIdToSession($gameid);


		/*
         *获取微信用户信息
         */
        $wxUserInfo = SysUtils::getValueBySessionKey('wxUserInfo');
        if(isset($wxUserInfo)){
            $unionid = $wxUserInfo['unionid'];
            $openid = $wxUserInfo['openid'];
        }else{
            return $this->redirect(UrlUtils::createUrl(["user/get-auth",'a'=>2,'gameid'=>$gameid]));
        }
		$errorCode = 0;
        $user = UserService::getUserInfoByMarkId($openid,$unionid,$errorCode,$gameid);
		$auditResult  = $user->getAgent();
        if($auditResult==0){            
             return $this->render('apply_step1');
         }else{
             if($auditResult==2){
                 return $this->render('applyTips2');             
             }elseif($auditResult==1){
                 $auditMsg = '代理资料正在审核中';
                 return $this->goAuditPage($auditMsg);
             }
         }
	
	}

    //进入代理后台
	public function actionGoAgentBackend(){
		/*
         *获取微信用户信息
         */

		if(isset($_GET['gameid'])){
			$gameid = $_GET['gameid'];	
			SysService::setGameIdToSession($gameid);
		}else{
			$gameid = SysUtils::getValueBySessionKey('gameid');

		}

        $wxUserInfo = SysUtils::getValueBySessionKey('wxUserInfo');
        if(isset($wxUserInfo)){
            $unionid = $wxUserInfo['unionid'];
            $openid = $wxUserInfo['openid'];
        }else{
            return $this->redirect(UrlUtils::createUrl(["user/get-auth",'a'=>1,'gameid'=>$gameid]));
        }
		$errorCode = 0;
        $user = UserService::getUserInfoByMarkId($openid,$unionid,$errorCode,$gameid);
		$auditResult  = $user->getAgent();
		
        if($auditResult==0){            
             return $this->render('applyTips');
         }else{
             if($auditResult==2){
                 return $this->index();                
             }elseif($auditResult==1){
                 $auditMsg = '代理资料正在审核中';
                 return $this->goAuditPage($auditMsg);
             }
         }
	
	}
    /*
     * 跳转代理注册审核页面;
     */ 
    public function goAuditPage($msg){

        $title = "提示信息";
        return $this->render('auditmsgpage',['auditmsg'=>$msg,'title'=>$title]);
    }

    /*
     * 进入申请第二步，获取用户unionid，游戏ID；
     *
     * @return mixed
     */
    public function actionGoApplyStep2(){
        $wxUserInfo = SysUtils::getValueBySessionKey('wxUserInfo');		
        if(isset($wxUserInfo)){
            $unionid = $wxUserInfo['unionid'];
            $openid = $wxUserInfo['openid'];
        }else{
            return $this->redirect(UrlUtils::createUrl(["user/get-auth",['a'=>2]]));
        }
        if(isset($_GET['gameid'])){
            $gameId = $_GET['gameid'];
        }else{
            throw new \Exception("游戏ID不存在!");
        }

		$errorCode = 0;
        $isRegistered = UserService::findGameRegisterAccount($unionid,$openid,$gameId,$errorCode); 
        $title = '申请与查询';
		$actorId = null;
		if($isRegistered==1){
			$accountInfo = UserService::getUserInfoByMarkId($openid,$unionid,$errorCode,$gameId);
			$actorId = $accountInfo->getActorId();	
		}
        return $this->render('apply_step2',['gameId'=>$gameId,'title'=>$title,'actorId'=>$actorId]);
       
    }




        // /**
    //  * 查找账是否注册
    //  * @return boolean 返回注册结果;
    //  */
    // public function actionFindRegisterAcct(){
    //     $unionid = "oFea0wS8Rr5iL0Y_A9t1YqRlZ_NI";
    //     $openid = "oDtH81V6r-eaKTvZqzfti1-_7oIk";
    //     $errorCode = 0;
    //     if(UserService::findGameRegisterAccount($unionid,$openid,$errorCode)){
    //         echo "find"."errorcode:".$errorCode;
    //     }else{
    //         echo "no find"."errorcode:".$errorCode;
    //     }
    // }
    // /**
    //  * 注册后台账号;
    //  */
    // public function actionRegisterAcct(){
    //     $cmd = new Cmd();
    //     $cmdCode = $cmd::CMD_B2M_Register_Request;
    //     //
    //     $req = new B2M_Register_Request();
    //     $req->setId(11);
    //     $req->setName("余小辉DSB");
    //     //制作消息对象
    //     $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode);
    //     //发送消息;
    //     $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
    //     $resp = new M2B_Register_Response();
    //     $errorCode = 0;
    //     HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
    //     echo $resp->getBackendCount();

    // }
	 public function actionSendTelVerify(){

         if(isset($_GET['telephone'])&&!empty($_GET['telephone'])){
             $tel = $_GET['telephone'];
         }else{
             throw new \Exception("参数不合法!");
         }    
         $vCode =  SysUtils::generateTelVerifyNums();
         SysService::saveVerifyTmpCode($tel,$vCode);
         try {
             $phoneNumber1 = $tel;
             $appid = SysUtils::SMS_APP_ID;
             $appkey = SysUtils::SMS_APP_KEY;            
             $templId = SysUtils::SMS_TPL_ID;         
             $singleSender = new SmsSingleSender($appid, $appkey);
             $params = [$vCode];
             $result = $singleSender->sendWithParam("86", $phoneNumber1, $templId, $params, "", "", "");
             
             return json_encode(['flag'=>'success']);
         } catch (\Exception $e) {
			 
             echo var_dump($e);
         }
	 }
    
}
