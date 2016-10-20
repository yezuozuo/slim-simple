<?php

date_default_timezone_set('Asia/Shanghai');

//set_error_handler('zoco_auto_error_log', E_ALL & ~E_DEPRECATED & ~E_STRICT);
//$GLOBALS['uuidtolog'] = uniqid('', true);
//function zoco_auto_error_log($errorno, $errorstr, $errorfile, $errorline) {
//    echo 123;
//    $curerrorno = error_reporting();
//    if (($curerrorno & ~$errorno) == $curerrorno) {
//        return true;
//    }
//    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
//    $EXIT = false;
//    switch ($errorno) {
//        case E_NOTICE:
//        case E_USER_NOTICE:
//            $error_type = 'Notice';
//            break;
//        case E_WARNING:
//        case E_USER_WARNING:
//            $error_type = 'Warning';
//            break;
//        case E_ERROR:
//        case E_USER_ERROR:
//            $error_type = 'Fatal Error';
//            $EXIT = TRUE;
//            break;
//        default:
//            $error_type = 'Fatal Error';
//            $EXIT = TRUE;
//            break;
//    }
//    $timezone = date_default_timezone_get();
//    $momoid = isset($GLOBALS['momoidtolog']) ? $GLOBALS['momoidtolog'] : '';
//    $request_uri_text = $request_uri ? '   [REQUEST_URI:' . $request_uri . ']' : '   [REQUEST_URI: Unkown]';
//    $text = '[' . date('d-M-Y H:i:s', time()) . ' ' . $timezone . '] ' . $momoid.'-'.$GLOBALS['uuidtolog'] . ' PHP' . ' ' . $error_type . ':  ' . $errorstr . ' in ' . $errorfile . ' on line ' . $errorline . $request_uri_text . "\n";
//    $log_path = __DIR__.'/../log/'.date('Y-m-d').'.log';
//    if (is_writeable($log_path)) {
//        file_put_contents($log_path, $text, FILE_APPEND);
//    }
//    if ($EXIT) {
//        die();
//    }
//    return true;
//}

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/helpers.php';

$env = new Dotenv\Dotenv(__DIR__.'/../');
$env->load();

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

$container['flash'] = function() {
	return new \Slim\Flash\Messages;
};

$container['view'] = function ($container) {
	$view = new \Slim\Views\Twig(__DIR__ . '/../resources/views/', [
		'cache' => false,
	]);

	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));

	$view->getEnvironment()->addGlobal('flash',$container->flash);
    $view->getEnvironment()->addGlobal('session', $_SESSION);

    return $view;
};

$container['HomeController'] = function($container) {
	return new \App\Controllers\HomeController($container);
};

$container['notFoundHandler'] = function ($container) {
    return function ($request, \Slim\Http\Response $response) use ($container) {
        return $container['view']->render($response, 'errors/404.twig')->withStatus(404);
    };
};

require __DIR__ . '/../app/routes.php';