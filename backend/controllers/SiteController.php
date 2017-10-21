<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\LoginForm;
use backend\models\User;


/**
 * 实现用户登录，注销等功能;
 */
class SiteController extends Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout','home'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login','logout','home'],
                        'roles' => ['@']
                    ],
                ]
            ]

        ];

    }

    /**
    * 说明:跳到登录界面，并且实现登录操作;
    * 执行方法为get时，显示登录页面，当POST时，执行登录操作并跳转到指定页面;
    */
    public function actionLogin(){
        if(!Yii::$app->user->isGuest){
            return $this->goHome();  
        }
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post())&&$model->login()){
            return $this->goBack();
        }
        $this->layout = false;        
        return $this->render("login",['model'=>$model]);
    }
    /**    
    * 说明:注销当前用户
    */
    public function actionLogout(){
        Yii::$app->user->logout();    
        return $this->goHome();  
    }
    /**    
    * 说明:进入首页
    */
    public function actionHome(){
        $this->layout = false;
        return $this->render("home");
    }


}
