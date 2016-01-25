<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SpeedOpenOAuth;
use m\models\XUser;

class SiteController extends AuthController
{

	protected function needAuth() {
		return false;
	}

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
                    'logout' => ['post'],
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

	}
    public function actionAuth() {
    	//$sa = SpeedOpenOAut
    	define("SERVER_ONLINE", FALSE);
    	define( "SPEED_APPKEY" , '100001' );
    	define( "SPEED_APPSECRET" , '543774710dcc91a7e52428bf02ac8c41' );
    	//define( "SPEED_CALLBACK_URL" , 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"] . 'callback.php' );
    	define("SPEED_CALLBACK_URL", 'http://postmill.local:8080/index.php?r=site/auth');

    	// $oauth = new \app\trdapi\mls\SpeedOpenOAuth( SPEED_APPKEY , SPEED_APPSECRET );
    	// $oauth = new SpeedOpenOAuth( SPEED_APPKEY , SPEED_APPSECRET );
    	$oauth = new SpeedOpenOAuth( Yii::$app->params['oauth']['appid'] , Yii::$app->params['oauth']['appsecretkey'] );


    	$keys = [];
    	$keys['redirect_uri'] = SPEED_CALLBACK_URL;
    	if (isset($_REQUEST['code'])) {
    		$keys['code'] = $_REQUEST['code'];
    	}
    	// var_dump($keys);
    	try {
    		$token = $oauth->getAccessToken( 'code', $keys ) ;
    		// var_dump($token);

    	} catch (Exception $e) {
    		$msg = $e->getMessage();
    	}

    	if ($token && $token['code']==200) {
    		$_SESSION['token'] = $token;
    		setcookie( 'speed_token_'.$oauth->client_id, http_build_query($token) );
    	}
    	$this->goBack();
    	// die;
    	// sso end
    }
    public function actionLogin()
    {
    	return Yii::$app->getResponse()->redirect("http://apitest.speed.server.com/oauth/authorize?client_id=100001&response_type=code&redirect_uri=http://metrics.local:8080/index.php?r=site/auth");
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
