<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\Session;
use common\models\HttpUtils;
use common\models\DataModel;

use Manager\Cmd;
use Manager\B2M_FindRegisterAccount_Request;
use Manager\M2B_FindRegisterAccount_Response;
use Manager\B2M_SearchAccount_Request;
use Manager\M2B_SearchAccount_Response;



/**
 * 代理商(用户)服务
 */
class UserService extends Model
{

    /**
     * 获取用户信息
     *
     * @return array
     */
	public static function getUserInfo($token,$openid){

		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=$token&openid=$openid&lang=zh_CN";
		$userinfo  = HttpUtils::getJson($url);	
        $session = Yii::$app->session;
        $session->set('wxUserInfo',$userinfo);
        return $userinfo;
	}
    /**
     * 获取微信TOKEN
     *
     * @return array
     */
	public static function getAccessToken($appid,$secret,$code){
//        $cache = Yii::$app->cache; 
//        $cache_token_info = $cache->get('access_token_info'); 
//        $token_expire = $cache->get('expire_time'); 
//        if((time()>$token_expire)||($cache_token_info === false)){
            $new_token_info = self::getNewAccessToken($appid,$secret,$code);
         //   $cache->set('access_token_info', $new_token_info); 
         //   $cache->set('expire_time', time()+7000); 
			return $new_token_info;
			
//        }else{
//            return $cache_token_info;            
//        }

	}
    /**
     * 向服务器获取微信TOKEN
     *
     * @return array
     */
    public static function getNewAccessToken($appid,$secret,$code){
        $tokenUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code"; 
        return HttpUtils::getJson($tokenUrl); 

    }

    /**
     * 查找注册账号是否存在；
     *
     * @return array
     */
    public static function findGameRegisterAccount($unionid,$openid,$gameid,&$errorCode){
        //通讯指令
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_FindRegisterAccount_Request;
        //设置请求条件;
        $req = new B2M_FindRegisterAccount_Request();
        $req->setUnionId($unionid);
        $req->setOpenId($openid);
		
        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);
        //
        $resp = new M2B_FindRegisterAccount_Response();
        
        if(HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode)===false){
            
            return false;
        }
        return $resp->getFind();
    }

    /**
     * 根据openid,获取账号信息
     * 返回响应用户信息;
     */
    public static function getUserInfoByMarkId($openid,$unionid,&$errorCode,$gameid){
        $cmd = new Cmd();
        $cmdCode = $cmd::CMD_B2M_SearchAccount_Request;
        //
        $req = new B2M_SearchAccount_Request();
  //      $req->setWxUnionId("oFea0wX38SmUta357y3zwNB8HYLI");
  //    
        $req->setWxUnionId($unionid);
        $req->setWxOpenId($openid);

        //制作消息对象
        $reqMsgStream = HttpUtils::makeNetMsg($req,$cmdCode,$gameid);
        //发送消息;
        $respMsgStream = HttpUtils::sendNetMsg($reqMsgStream);

        $resp = new M2B_SearchAccount_Response();
        $errorCode = 0;
        HttpUtils::parseNetMsg($resp,$respMsgStream,$errorCode);
        return $resp;

    }

	public static function checkAuthVerify($tel,$telcode){

		$sql = "select count(*) as cnt from tmp_verify_code where telephone='$tel' and vcode='$telcode'";
		$result = DataModel::execSql($sql);
	    return current($result)['cnt']>0;
	
	
	
	}









    




}
