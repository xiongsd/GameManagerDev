<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



use backend\models\SysService;

use Manager\Cmd;
use Head\NetMsg;
use Manager\B2M_GetServerInfo_Request;
use Manager\M2B_GetServerInfo_Response;
/**
 * 实现共享功能;
 */
class UtilsController extends Controller
{

	public function behaviors(){
			return [
				'access' => [
					'class' => AccessControl::className(),
					'only' => ['build-menu-tree'],
					'rules' => [

						[
							'allow' => true,
							'actions' => ['build-menu-tree'],
							'roles' => ['@']
						],
					]
				]

			];

    }

    //生成菜单结点数据;
    public function actionBuildMenuTree(){
        $data = SysService::getMenuData();
        return json_encode($data);
    }

    public function actionGetServerInfo(){
    	$cmd = new Cmd();
        /**
         * 初始化请求对响
         * @var B2M_RollingBulletin_Request
         */
        $req = new B2M_GetServerInfo_Request();
        /**
         * 制作请求消息二进制流
         * @var binary
         */
        $reqMsgStr = HttpUtils::makeNetMsg($req,$cmd::CMD_B2M_GetServerInfo_Request);
        /**
         * 发送消息
         * @var binary
         */
        $respMsgStr = HttpUtils::sendNetMsg($reqMsgStr);
        /**
         * 初始化响应对象
         * @var M2B_RollingBulletin_Response
         */
        $resp = new M2B_GetServerInfo_Response();
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
        
        


    	
    }


}
