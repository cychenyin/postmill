<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UsageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['message' => 'index' ]);
    }
    
	public function actionSay($message = 'Hello')
    {
    	$a=  "x";
    	var_dump($a);
    	
        return $this->render('index', ['message' => $message]);
    }

}
