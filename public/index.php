<?php
$start = microtime(true);

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("APP_PATH",  realpath(dirname(__FILE__) . '/../app/')); /* 指向public的上一级 */

require '../vendor/autoload.php';

if (isset($_SERVER['HTTP_USER_AGENT']) && substr($_SERVER['HTTP_USER_AGENT'], 0, 11) === 'PHP Yar Rpc') {
	require APP_PATH.'/application/Service.php';
	$service = new Yar_Server(new Service());
    $service->handle();
}else{
	$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");

	$params = array();
	if (Yaf_Dispatcher::getInstance()->getRequest()->isGet()) {
		$params = Yaf_Dispatcher::getInstance()->getRequest()->getQuery();
	}else{
		$params = Yaf_Dispatcher::getInstance()->getRequest()->getPost();
	}
	foreach ($params as $key => $value) {
		Yaf_Dispatcher::getInstance()->getRequest()->setParam($key,$value);
	}

	$app->bootstrap()->run();
}

$end = microtime(true);
$time=($end-$start)*1000;
// echo "\n<br>".$time.'ms';
// echo number_format($time, 10, '.', ");