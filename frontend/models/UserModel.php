<?php
namespace frontend\models;

use Yii;

class UserModel extends \yii\db\ActiveRecord{
    //用于模型映射数据表;
    public static function tablename()
    {
        return 'sec_users';
    }

    //验证规则;
    public function rules() {
        return [
            [['username','nickname','sex','telephone','markid'],'required'],
            [['create_at','status','ipaddr','promocode'], 'safe'],

        ];
    }




}






















?>