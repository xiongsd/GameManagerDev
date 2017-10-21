<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\DataModel;

/**
 * 统计服务
 */
class StatisticsService extends Model
{
   	 /**
     * 1.说明:获取当日业绩
     * 2.参数:$page表示当前页码，$offset表示每页显示的记录数
     * 3.如果记录数为0，返回NULL，否则返回记录数组;
     */
	public static function getAchievementByCurrentDate($page,$offset){

		//条件: date_format(create_at,"%Y%m%d") = date_format(now(),"%Y%m%d")

	}
   	 /**
     * 1.说明:获取本月业绩
     * 2.参数:$page表示当前页码，$offset表示每页显示的记录数
     * 3.如果记录数为0，返回NULL，否则返回记录数组;
     */
	public static function getAchievementByCurrentMonth($page,$offset){

		//条件: date_format(create_at,"%Y%m") = date_format(now(),"%Y%m")

	}
   	 /**
     * 1.说明:获取上月业绩
     * 2.参数:$page表示当前页码，$offset表示每页显示的记录数
     * 3.如果记录数为0，返回NULL，否则返回记录数组;
     */
	public static function getAchievementByPrevMonth($page,$offset){

		//条件: date_format(create_at,"%Y%m") = date_format(date_sub(now(), interval 1 month),'%Y%m') 

	}
	 /**
     * 1.说明:获取累计业绩
     * 2.参数:$page表示当前页码，$offset表示每页显示的记录数
     * 3.如果记录数为0，返回NULL，否则返回记录数组;
     */
	public static function getAllAchievement($page,$offset){

		//条件: true

	}
}
