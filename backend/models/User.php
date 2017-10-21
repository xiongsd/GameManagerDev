<?php

namespace backend\models;

use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
	
	//映射数据库用户表;
	public static function tablename() {
		return 'sec_admin_users';
	}
	// 验证规则
	public function rules() {
		return [ 
				[['username','nickname','sex','telephone','password'],'required'],
				[['create_at','last_login','status','avatar'],'safe']
		];
	}
 

	// 根据账号查询用户，并返回对象；
	public static function findByUsername($username) {
		return static::findOne ( [ 
				'username' => $username 
		] );
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id) {
		return static::findOne ( $id );
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		return null;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getId() {
		
		return $this->userid;
	}
	/**
	 * @inheritdoc
	 */
	public function getUserName() {

		return $this->username;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
		return null;
	}
	
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
		return null;
	}
	
	// 验证密码
	public function validatePassword($password) {
		return $this->password === md5 ( $password );
	}


}