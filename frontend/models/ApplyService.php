<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\DataModel;

/**
 * ContactForm is the model behind the contact form.
 */
class ApplyService extends Model
{
   	 /**
     * 根据用户Id,返回审核状态
     *
     * @return array (0=>'审核中',1='审核通过',2='审核失败')
     */
	public static function getAuditStatus($userid){
		$eSql = "select status from biz_user_game where userid = $userid";
		$result = DataModel::execSql($eSql);
		return $result[0]['status'];
	}
	   	 /**
     * 根据用户Id,获取游戏ID
     *
     * @return array (0=>'审核中',1='审核通过')
     */
	public static function getGameId($uid){

		return 'U111111111111';
	
	}
 	   	 /**
     * 根据用户Id,获取游戏ID
     *
     * @return null;
     */
	public static function doAudit($gameno){

		//执行审核提交；
	
	}  


}
