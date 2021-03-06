<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Expression;

use common\models\DataModel;
use frontend\models\UserService;

/**
 * 交易服务 
 */
class TradeService extends Model
{
   	 /**
     * 按页显示赠送明细
     *
     * @return array，if is null,return null;
     */
	public static function getDonateItemsByPage($gameid,$page,$offset){
		$rowNum = $page*$offset;
		$eSql = "select 
					a.tradeid,
					date_format(a.create_at,'%Y%m%d') as create_at,
					a.from_game_id,
					a.to_game_id,
					b.username,
					b.nickname,
					a.qty
					from biz_trade a
					left join sec_users b on a.to_game_id = b.gameid
					where a.from_game_id = '$gameid'";
	    $limitSql = " limit 0,$rowNum";
	    $orderSql = " order by create_at desc";
	    $eSql .= $orderSql;
	    $eSql .= $limitSql;
	    
		return DataModel::execSql($eSql);
	}
	public static function getDonateItemsCount($gameid){
		$cSql = "select count(*) as cnt
				 from biz_trade
				 where from_game_id = '$gameid'";
	    $result = DataModel::execSql($cSql);
	    return current($result)['cnt'];

	}
	public static function getAcceptItemsByPage($gameid,$page,$offset){
				$rowNum = $page*$offset;
		$eSql = "select 
					a.tradeid,
					date_format(a.create_at,'%Y%m%d') as create_at,
					a.from_game_id,
					a.to_game_id,
					b.username,
					b.nickname,
					a.qty
					from biz_trade a
					left join sec_users b on a.from_game_id = b.gameid
					where a.to_game_id = '$gameid'";
	    $limitSql = " limit 0,$rowNum";
	    $orderSql = " order by create_at desc";
	    $eSql .= $orderSql;
	    $eSql .= $limitSql;
	    
		return DataModel::execSql($eSql);
	}
	public static function getAcceptItemsCount($gameid){
		$cSql = "select count(*) as cnt
				 from biz_trade
				 where to_game_id = '$gameid'";
	    $result = DataModel::execSql($cSql);
	    return current($result)['cnt'];

	}

	public static function getDistributeRank($period,$limit = 0){

		$sql = "
				select goodname,userid,username,nickname,sum(qty) as tqty
				from biz_distribute_v
				where date_format(create_at,\"%Y%m\") = '$period'
				group by userid
				order by tqty desc
		";
		if($limit){
			$lSql = " limit 0,$limit";
			$sql .= $lSql;
		}
		$rows = DataModel::execSql($sql);
		return $rows;
	}

	public static function getWealthByGameId($gameid){
		$sql = "
			select 
			to_game_id,
			sum(qty) as tqty
			from biz_trade
			where to_game_id = '$gameid'
			group by to_game_id
		";
		$inQty = 0;
		if(!empty(DataModel::execSql($sql))){
			$inQty = current(DataModel::execSql($sql))['tqty'];
		}
		$sql2 = "
			select 
			from_game_id,
			sum(qty) as tqty
			from biz_trade
			where from_game_id = '$gameid'
			group by from_game_id
		";
		$outQty = 0;
		if(!empty(DataModel::execSql($sql2))){
			$outQty = current(DataModel::execSql($sql2))['tqty'];
		}
		return $inQty-$outQty;

	}
	
	

	public static function toWriteRechargeItems($gameid,$actorid,$actorid,$cardcount,$t_fee,$itemid,$orderid,$pay_at){
		
   		$iData = [
   			'targetid' => $actorid,
   			'operid' => $actorid,
   			'cardcount' => $cardcount,
   			't_fee' => $t_fee,
   			'itemid' => $itemid,
   			'orderid' => $orderid,
   			'pay_at' => $pay_at,
			'gameid' => $gameid
   		];
   		DataModel::insert('biz_rechargeitems',$iData);

	}

	public static function findWriteRechargeItem($orderid){
		$sql = "select count(1) as cnt from biz_rechargeitems where orderid = '$orderid'";
		$result =  DataModel::execSql($sql);
		return current($result)['cnt'];

	}

	public static function updateRechargeStatus($orderid){
		$sql = "update biz_rechargeitems set status=1 where orderid = '$orderid'";
		DataModel::execSql($sql);

	}



}
