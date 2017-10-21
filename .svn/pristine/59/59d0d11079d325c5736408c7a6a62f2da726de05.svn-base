<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Expression;
use common\models\DataModel;

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

}
