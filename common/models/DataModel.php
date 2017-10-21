<?php

namespace common\models;

use Yii;

/*
* 项目数据模型类;
*/
class DataModel
{

    public static function getDbCmd()
    {
        return Yii::$app->db->createCommand();
    }

    public static function execSql($sql)
    {
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function update($table,$setarr,$condition)
    {
        return self::getDbCmd()->update($table,$setarr,$condition)->execute();

    }

    public static function insert($table,$data)
    {
        return self::getDbCmd()->insert($table,$data)->execute();
    }





}