<?php

namespace backend\models;

use Yii;

use common\models\DataModel;
use common\models\BuildTreeArray;

class SysService{
	//实现生成菜单树数据数组;
	public static function getMenuData(){
		$sql = "
			select
				menuid as id,
				pid as pid,
				shortname as text,
				iconcls as iconCls,
				state as state
			from sys_menus
			order by seqno asc
		";
		$bta = new BuildTreeArray(DataModel::execSql($sql),'id','pid',-1);  
        $data = $bta->getTreeArray();  
        self::attachAttrInfo($data);
		return $data;

	}
	//为节点数组添加属性信息
	private static function attachAttrInfo(&$datas){
		//die(var_dump($datas));
		foreach ($datas as &$value) {
			$attrs = self::getAttrById($value['id']);
			$value['attributes'] = [];
			foreach($attrs as $attr){
				$value['attributes'][$attr['attr_name']] = $attr['attr_value'];
			}
			self::attachAttrInfo($value['children']);
		}
    }
    //根据菜单ID获取属性信息，该方法为私有;
	private static function getAttrById($id){
		$sql = "
				select
					attr_name,
					attr_value
				from sys_menus_attr
				where menuid = $id";
	    return DataModel::execSql($sql);

	}


}