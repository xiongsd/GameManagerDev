<?php
namespace common\models;


use Head\Cmd;
use Head\NetMsg;
use Head\ErrorCode;

class NetMsgFactory{
	/**
	 * 解析服务器响应数据二进制数据;
	 * @return binary;
	 */    
	public static function parseNetMsg(&$contentObj,$respMsgStr){
			$errCode = new ErrorCode();
	        $acceptNetMsg = new NetMsg();
	        //解析消息        
	        if($acceptNetMsg->getErrorCode()==$errCode::ERROR_NoError){
	        	$acceptNetMsg->mergeFromString($respMsgStr);
	        	$contentObj->MergeFromString($acceptNetMsg->getContent());
	        	return true;
	        }else{
	        	return false;//存在错误返回;
	        }
		}
		/**
	     * 向游戏服务器发送消息指令
	     *
	     * @return binary 服务器端响应二进制流;
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
	        $data = curl_exec($ch);        
	        curl_close($ch);
	        return $data;
		}

		public static function makeNetMsgStream($cotentObj,$cmd){
			$sendNetMsg = new NetMsg();
	        $sendNetMsg->setCmd($cmd);
	        $sendNetMsg->setErrorCode(0);
	        $toStr = $cotentObj->serializeToString();
	        $sendNetMsg->setContent($toStr);
	        return $sendNetMsg->serializeToString();

		}	
}