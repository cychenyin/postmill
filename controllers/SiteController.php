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
use app\models\User;
use app\models\SpeedOpenClient;
// use app\trdapi\mls\SpeedOpenOAuth;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //return $this->render('index');
        $this->redirect('/index.php?r=job/index',200);
    }
	public function actionSpeed() {
		// Yii::$app->urlManager
	}

	// Authentication
    public function actionAuth() {
    	$oauth = new SpeedOpenOAuth( Yii::$app->params['oauth']['appid'] , Yii::$app->params['oauth']['appsecretkey'] );
    	$callbackUrl = 'http://' . Yii::$app->params['oauth']['domain'] . '/index.php?r=site/auth';

    	$keys = [];
    	$keys['redirect_uri'] = $callbackUrl;

    	if (isset($_REQUEST['code'])) {
    		$keys['code'] = $_REQUEST['code'];
    		try {
    			$token = $oauth->getAccessToken( 'code', $keys ) ;
// echo "<br><br><br>";
// echo $oauth->getApiHost();
// echo "<br><br>request<br>";
// var_dump($_REQUEST);

// echo "<br><br>tokens<br>";
// var_dump($token);
// die;
    		} catch (Exception $e) {
    			$msg = $e->getMessage();
    		}

    		if ($token && $token['code']==200 && isset($token['access_token'])) {
    			$_SESSION['token'] = $token;
    			//setcookie( 'speed_token_'.$oauth->client_id, http_build_query($token) );
    			setcookie( 'speed_token_'. Yii::$app->params['oauth']['appid'], http_build_query($token) );

    			$user = new \app\models\User();
    			$user->accessToken = $token["access_token"];
    			$user->authKey = '';

    			$detail = $oauth->getUserInfo($user->accessToken);
				if($detail && isset($detail['code']) && $detail['code'] == 200 && isset($detail['data']) && isset($detail['expires_in'])) {
					setcookie( 'speed_user', http_build_query($detail['data']), $detail['expires_in'] );

					$user->id = $detail['data']['id'];
					$user->username = $detail['data']['name'];
					$user->mail = $detail['data']['mail'];

					echo "<br><br>user info get successfully<br>";
				}
				Yii::$app->user->login($user);
    			// Yii::$app->user->login(
    			// Yii::$app->user->loginByAccessToken
    			// Yii::$app->user->loginByCookie

    			return $this->goHome();
    		}
    	}
    	return Yii::$app->user->loginRequired();
    }
    public function actionLogin()
    {

 		$callbackUrl = 'http://' . Yii::$app->params['oauth']['domain'] . '/index.php?r=site/auth';
 		$speedUrl = (new SpeedOpenOAuth(null, null))->getApiHost() . 'oauth/authorize?client_id=' . Yii::$app->params['oauth']['appid'] . '&response_type=code&redirect_uri=' . $callbackUrl;

 		return Yii::$app->getResponse()->redirect($speedUrl);

    	// default code
//         if (!\Yii::$app->user->isGuest) {
//             return $this->goHome();
//         }
//         $model = new LoginForm();
//         if ($model->load(Yii::$app->request->post()) && $model->login()) {
//             return $this->goBack();
//         } else {
//             return $this->render('login', [
//                 'model' => $model,
//             ]);
//         }
    }

    public function actionLogoutx() {
    	$expire = time()-60*60*24*365;
    	setcookie('speed_token_'. Yii::$app->params['oauth']['appid'], '', $expire);
    	setcookie('speed_user', '', $expire);

    	//     	if(!Yii::$app->user->isGuest)
    	//     	 	Yii::$app->user->logout();
    	return $this->render('logout', []);
    }

    public function actionLogout()
    {
    	Yii::$app->user->logout();
    	// return Yii::$app->user->loginRequired();
    	return $this->actionLogin();
    }

    public function goLogin() {
    	return "";
    	// return \Yii::$app->getResponse()->redirect('http://' . Yii::$app->params['oauth']['domain'] . '/index.php?r=site/login');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionError($e=NULL) {
    	Yii::$app->log->getLogger()->log($d, Logger::LEVEL_ERROR);
    	return $this->goHome();
    }
}
