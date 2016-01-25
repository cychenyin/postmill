<?php
ini_set ( 'date.timezone', 'Asia/Shanghai' );

$env = 'prod';
$offline = [
		'dev',
		'test'
];

if (isset ( $_SERVER ['RUNTIME_ENVIROMENT'] ) && $_SERVER ['RUNTIME_ENVIROMENT']) {
	$env = strtolower ( $_SERVER ['RUNTIME_ENVIROMENT'] );
}

if (! in_array ( $env, $offline )) {
	header ( 'Runtime-Enviroment: ' . $env );
	error_reporting ( E_ALL );
	ini_set ( 'display_errors', 1 );
} else {
	error_reporting ( 0 );
	ini_set ( 'display_errors', 0 );
}

// comment out the following two lines when deployed to production
if (in_array ( $env, $offline )) {
	defined ( 'YII_DEBUG' ) or define ( 'YII_DEBUG', true );
	defined ( 'YII_ENV' ) or define ( 'YII_ENV', 'dev' );

	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
	    'class' => 'yii\gii\Module',
	];
} else {
	defined ( 'YII_ENV' ) or define ( 'YII_ENV', 'prod' );
}
defined ( 'SERVER_ONLINE' ) or define ( "SERVER_ONLINE",  !in_array ( $env, $offline ) ); // Speed oauth used

require (__DIR__ . '/../vendor/autoload.php');
require (__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

if (in_array ( $env, $offline )) {
	$config = require (__DIR__ . '/../config/test/web.php');
} else {
	$config = require (__DIR__ . '/../config/web.php');
}

(new yii\web\Application ( $config ))->run ();