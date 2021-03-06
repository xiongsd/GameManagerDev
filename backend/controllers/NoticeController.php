<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\HttpUtils;
use common\models\SysUtils;

use Manager\Cmd;
use Head\NetMsg;
use Manager\B2M_GetAnnouncement_Request;
use Manager\M2B_GetAnnouncement_Response;
use Manager\B2M_GetRollingBulletin_Request;
use Manager\M2B_GetRollingBulletin_Response;
use Manager\B2M_SetRollingBulletin_Request;
use Manager\M2B_SetRollingBulletin_Response;
use Manager\B2M_AddNewAnnouncement_Request;
use Manager\M2B_AddNewAnnouncement_Response;
use Manager\B2M_ModifyAnnouncement_Request;
use Manager\M2B_ModifyAnnouncement_Response;
use Manager\B2M_RemoveAnnouncement_Request;
use Manager\M2B_RemoveAnnouncement_Response;
use Manager\Announcement;



/**
 * 公告
 */
class NoticeController extends Controller
{
	public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add-notice','modify-notice','get-notice-data','get-rolling-bulletin','set-rolling-bulletin'],
                'rules' => [

                    [
                        'allow' => true,
                        'actions' => ['add-notice','modify-notice','get-notice-data','get-rolling-bulletin','set-rolling-bulletin'],
                        'roles' => ['@']
                    ],
                ]
            ]

        ];

    }

	public function actionGoAddNotice(){
	    $this->layout = false;
        return $this->render("addNotice");
	}
    /**
     * 新增公告数据
     * @return JSON
     */
    public function actionAddNotice(){
        $cmd = new Cmd();
        /**
         * 初始化请求对响
         * @var B2M_AddNewAnnouncement_Request
         */
        $req = new B2M_AddNewAnnouncement_Request();
        /**
         * 初始化通知
         * @var Announcement
         */
		date_default_timezone_set('Asia/Shanghai'); 
        $announcement = new Announcement();
        $announcement->setId(10);
        $announcement->setTime(strtotime($_GET['time']));
        $announcement->setTitle($_GET['title']);
        $announcement->setContent($_GET['content']);
        $req->setAnnouncements($announcement);
        /**
         * 制作请求消息二进制流
         * @var binary
         */
        $reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_AddNewAnnouncement_Request,$_GET['gameid']);
        /**
         * 发送消息
         * @var binary
         */
        $respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
        /**
         * 初始化响应对象
         * @var M2B_AddNewAnnouncement_Response
         */
        $req = new M2B_AddNewAnnouncement_Response();
        //错误代码
        $errorCode = 0;
        /**
         * 解析消息流
         * @var boolean
         */    
        if(HttpUtils::parseNetMsg($req,$respMsgStr,$errorCode)===false){
            throw new \Exception("错误!");
        }else{
			return json_encode(['flag'=>'success']);
		}
        /**
         * 解析对象并返回公告数json数据
         * @var json
         */ 
        
        

    }

	public function actionDelNotice(){
		$cmd = new Cmd();
		$req = new B2M_RemoveAnnouncement_Request();
		date_default_timezone_set('Asia/Shanghai'); 
		FILE_PUT_CONTENTS('log.txt',"时间值：".strtotime($_GET['time']),FILE_APPEND);
		$req->setTime(strtotime($_GET['time']));
		$reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_RemoveAnnouncement_Request,$_GET['gameid']);
		$respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
		$req = new M2B_RemoveAnnouncement_Response();
		$errorCode = 0;
		if(HttpUtils::parseNetMsg($req,$respMsgStr,$errorCode)){
            return json_encode(['flag'=>'success']);
        }else{
			return json_encode(['flag'=>'failure','msg'=>$errorCode]);
		
		}

	
	
	
	
	}
    /**
     * 修改公告数据
     * @return JSON
     */
    public function actionModifyNotice(){
        $cmd = new Cmd();
        /**
         * 初始化请求对响
         * @var B2M_ModifyAnnouncement_Request
         */
        $req = new B2M_ModifyAnnouncement_Request();
        /**
         * 初始化通知
         * @var Announcement
         */
        $announcement = new Announcement();
        $announcement->setId(10);
        date_default_timezone_set('Asia/Shanghai'); 
		$announcement->setTime(strtotime($_GET['time']));
        $announcement->setTitle($_GET['title']);
        $announcement->setContent($_GET['content']);
        $req->setAnnouncements($announcement);
        /**
         * 制作请求消息二进制流
         * @var binary
         */
        $reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_ModifyAnnouncement_Request,$_GET['gameid']);
        /**
         * 发送消息
         * @var binary
         */
        $respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
        /**
         * 初始化响应对象
         * @var M2B_ModifyAnnouncement_Response
         */
        $req = new M2B_ModifyAnnouncement_Response();
        //错误代码
        $errorCode = 0;
        /**
         * 解析消息流
         * @var boolean
         */    
        $errorCode = 0;
		if(HttpUtils::parseNetMsg($req,$respMsgStr,$errorCode)){
            return json_encode(['flag'=>'success']);
        }else{
			return json_encode(['flag'=>'failure','msg'=>$errorCode]);
		
		}
        
        

    }
    /**
     * 获取公告数据
     * @return JSON
     */
    public function actionGetNoticeData(){

        $cmd = new Cmd();
        /**
         * 初始化请求对响
         * @var B2M_GetAnnouncement_Request
         */
        $req = new B2M_GetAnnouncement_Request();
        /**
         * 制作请求消息二进制流
         * @var binary
         */
		$gameid = $_GET['gameid'];
        $reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_GetAnnouncement_Request,$gameid);
        /**
         * 发送消息
         * @var binary
         */
        $respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
        /**
         * 初始化响应对象
         * @var M2B_GetAnnouncement_Response
         */
        $resp = new M2B_GetAnnouncement_Response();
        //错误代码
        $errorCode = 0;
        /**
         * 解析消息流
         * @var boolean
         */    
        if(HttpUtils::parseNetMsg($resp,$respMsgStr,$errorCode)===false){
            throw new \Exception("错误!");
        }
        /**
         * 解析对象并返回公告数json数据
         * @var json
         */ 
		$notice = [];
		 date_default_timezone_set('Asia/Shanghai'); 
        foreach ($resp->getAnnouncements() as $announcement) {
			$arr = [
				'title' => $announcement->getTitle(),
				'content' => $announcement->getContent(),
				'time' => date("Y-m-d H:i:s",$announcement->getTime())
				
			
			];
            array_push($notice,$arr);
        }
		$countPage = 0;
		$notice2 = SysUtils::pageArray($countPage,$_GET['rows'],$_GET['page'],$notice,0);
		$result = ['total'=>count($notice),'rows'=>$notice2];	

		return json_encode($result);

        

    }
    /**
     * 获取滚动公告
     * @return text
     */
    public function actionGetRollingBulletin(){
        $cmd = new Cmd();
        /**
         * 初始化请求对响
         * @var B2M_RollingBulletin_Request
         */
        $req = new B2M_GetRollingBulletin_Request();
        /**
         * 制作请求消息二进制流
         * @var binary
         */
        $reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_GetRollingBulletin_Request,$_GET['gameid']);
        /**
         * 发送消息
         * @var binary
         */
        $respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
        /**
         * 初始化响应对象
         * @var M2B_RollingBulletin_Response
         */
        $resp = new M2B_GetRollingBulletin_Response();
        //错误代码
        $errorCode = 0;
        /**
         * 解析消息流
         * @var boolean
         */    
        if(HttpUtils::parseNetMsg($resp,$respMsgStr,$errorCode)){
            return json_encode(['flag'=>'success','content'=>$resp->getText()]);
        }else{
			return json_encode(['flag'=>'failure','msg'=>$errorCode]);
		
		}


    }
    public function actionSetRollingBulletin(){
        $cmd = new Cmd();
        /**
         * 初始化请求对响
         * @var B2M_RollingBulletin_Request
         */
        $req = new B2M_SetRollingBulletin_Request();
        $req->setText($_GET['content']);
        /**
         * 制作请求消息二进制流
         * @var binary
         */
        $reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_SetRollingBulletin_Request,$_GET['gameid']);
        /**
         * 发送消息
         * @var binary
         */
        $respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
        /**
         * 初始化响应对象
         * @var M2B_RollingBulletin_Response
         */
        $resp = new M2B_SetRollingBulletin_Response();
        //错误代码
        $errorCode = 0;
        /**
         * 解析消息流
         * @var boolean
         */    
        if(HttpUtils::parseNetMsg($resp,$respMsgStr,$errorCode)){
            return json_encode(['flag'=>'success']);
        }else{
			return json_encode(['flag'=>'failure','msg'=>$errorCode]);
		
		}

    }
}
