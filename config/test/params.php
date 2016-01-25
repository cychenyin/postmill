<?php
return [
	'adminEmail' => 'whoiswho@server.com',
	'metrics' => [
		//'urlPrefix' => 'http://192.168.64.5:8080/render',
	    'urlPrefix' => 'http://metric.server.com/render',
		// 'countPrefix' => 'stats.dev.pandora',
	    'countPrefix' => 'stats.bj.pandora',
		'timerPrefix' => 'stats.timers.bj.pandora',
	    'failurePrefix' => 'stats.bj.pandora.failure',
	    'failureMetric' => 'stats.bj.pandora.failure.total',
	    'validaccessMetric' => 'stats.bj.pandora.validaccess',
	    'mysqlQueryMetric' => 'stats.ex.pandora.mysql.query',
	    'mysqlExecuteMetric' => 'stats.ex.pandora.mysql.exec',
        'redisPersitanceMetric' => 'stats.ex.pandora.redis.persitance',
        'redisProxyMetric' => 'stats.ex.pandora.redis.proxy',
	],
	'breadcrumbs' => [],

	'oauth' => [
		'env' => 'dev',
		'domain' => 'postmill.local:8080',
		'appid' => '100297',
		'appsecretkey' => '17ea41b509ab2212531cabe26a0d8cb8',
	],
// 	'oauth' => [
// 		'env' => 'test',
// 		'domain' => 'metrics.local:8080',
// 		'appid' => '100001',
// 		'appsecretkey' => '543774710dcc91a7e52428bf02ac8c41',
// 	],

];
