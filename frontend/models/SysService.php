<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Expression;
use common\models\DataModel;
use common\models\SysUtils;

/**
 * ContactForm is the model behind the contact form.
 */
class SysService extends Model
{
   	public static function saveVerifyTmpCode($tel,$vcode){
   		$iData = [
   			'telephone' => $tel,
   			'vcode' => $vcode,
   			'create_at' => new Expression('current_timestamp'),
   			'expire_time' => new Expression('date_add(current_timestamp,interval 5 minute)')
   		];
   		DataModel::insert('tmp_verify_code',$iData);
   	}

	public static function setGameIdToSession($fgameid){
		$gameid = SysUtils::getValueBySessionKey('gameid');
		if(isset($gameid)){
            if($fgameid != $gameid){
				SysUtils::setValueBySessionKey('gameid',$gameid);
			}				
        }else{
            SysUtils::setValueBySessionKey('gameid',$fgameid);
        }
	}


}
