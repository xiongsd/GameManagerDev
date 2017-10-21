<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\User;

/**
 * 登录模型
 */
class LoginForm extends Model
{

    public $username;//用户账号
    public $password;//用户密码
    public $_user = null;//登录用户对象

    //登录验证规则;
    public function rules() {
        return [
            [['username','password'],'required'],
            ['password','validatePwd']
        ];
    }
    //验证密码;
    public function validatePwd($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', '账号或密码错误!');
            }
        }
    }
    //执行登录;
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(),0);
        } else {
            return false;
        }
    }
    //获取用户对象
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }




}