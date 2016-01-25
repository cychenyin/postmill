<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SpeedOpenOAuth;
use trdpai\mls;
use m\models\XUser;
// use app\trdapi\mls\SpeedOpenOAuth;

class AuthController extends Controller
{
	// 返回是否需要认证
	protected function needAuth() {
		return true;
	}
	
	public function beforeAction($action){
		$valid = true;
		if($this->needAuth()) {
			$valid = false;
			$request = Yii::$app->getRequest();
			$token_key = 'speed_token_' . \Yii::$app->params['oauth']['appid'];
			if(! \Yii::$app->user->isGuest  && isset($_COOKIE[$token_key])) {
				// code=200&access_token=8d4e5de4f1c2942d56d091b8baabb11f01890990&remind_in=2592000&expires_in=1440144601
				$arr = [];
				parse_str($_COOKIE[$token_key], $arr);
				if(isset($arr['expires_in']) && $arr['expires_in'] > time() ) {
					$valid = true;
				}	
			}
		}
		if(!$valid) {
			//Yii::$app->user->loginRequired();
			return \Yii::$app->getResponse()->redirect('http://' . Yii::$app->params['oauth']['domain'] . '/index.php?r=site/login');
		}
		
		return parent::beforeAction($action) && $valid;
	}
}