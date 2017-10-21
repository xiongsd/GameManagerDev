<?php
namespace common\models;

use Yii;
use yii\httpclient\Client;  
use yii\httpclient\Request;  
use yii\httpclient\RequestEvent;  

use common\models\SysUtils;


use Head\Cmd;
use Head\NetMsg;
use Head\ErrorCode;



class HttpUtils{
	/**
     * 通过curl访问url地址获取信息，以JSON格式返回
     *
     * @return JSON
     */
	public static function getJson($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return json_decode($output, true);
	
	}

	public static function parseNetMsg($contentObj,$respMsgStr,&$errorCode){
		$errCode = new ErrorCode();
        $acceptNetMsg = new NetMsg();
        //解析消息 
        $acceptNetMsg->mergeFromString($respMsgStr); 
        $errorCode = $acceptNetMsg->getErrorCode();
        if( $errorCode ==$errCode::ERROR_NoError){        	
        	$contentObj->MergeFromString($acceptNetMsg->getContent());
        	return true;
        }else{
        	return false;//存在错误返回;
        }
	}
	/**
     * 向游戏服务器发送消息
     *
     * @return var
     */
	public static function sendNetMsg($sendMsgStr){
        $ch=curl_init();  
        curl_setopt($ch,CURLOPT_URL,SysUtils::GAME_SERVER_ADDR); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //设置是通过post还是get方法
        curl_setopt($ch,CURLOPT_POST,1); 
        //传递的变量
        curl_setopt($ch,CURLOPT_POSTFIELDS,$sendMsgStr); 
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Connection:keep-alive','keep-Alive:timeout=999999']);
        curl_setopt($ch, CURLOPT_TIMEOUT,300);
        $data = curl_exec($ch);  
        $curlError = curl_errno($ch); 
        //curl发生错误，返回为null
        curl_close($ch);
        if($curlError>0){
            return false;
        }  
        return $data;
	}

	public static function makeNetMsg($cotentObj,$cmd,$gameid=1){
		$sendNetMsg = new NetMsg();
        $sendNetMsg->setCmd($cmd);
		$sendNetMsg->setGameId($gameid);
        $sendNetMsg->setErrorCode(0);
        $toStr = $cotentObj->serializeToString();
        $sendNetMsg->setContent($toStr);
        return $sendNetMsg->serializeToString();

	}


	public static function getPromShortAddr($promo_id){
		$ch = curl_init();
		$url = "http://suo.im/api.php?format=json&url=http://clickmeenterroom.xiaoyougames.com:8080/download/download.html?agent_id=$promo_id";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		//{"url":"http:\/\/suo.im\/1Vbkou","err":""}
		return json_decode($output, true);

	
	
	}

}
