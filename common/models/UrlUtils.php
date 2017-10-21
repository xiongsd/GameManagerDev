<?php
namespace common\models;

use Yii;

class UrlUtils{
	public static function createUrl($arr) {
		return Yii::$app->urlManager->createAbsoluteUrl ( $arr );
	}
}
