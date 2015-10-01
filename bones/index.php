<?php

define( 'DX_ROOT_DIR', dirname(__FILE__) . '/' );
//get root name
define( 'DX_ROOT_PATH', basename(dirname(__FILE__)) . '/' );



require_once 'AutoLoad.php';
new AutoLoad();

        const CONTROLLER = 'home';
        const ACTION = 'index';

\Database\Db::setInstance(
        \Database\DBConfig::DB_NAME, 
        \Database\DBConfig::DB_PASS, 
        \Database\DBConfig::DB_HOST, 
        \Database\DBConfig::DB_HOST
);


$uri = $_GET['uri'];
$uri = trim($uri, '/');
$requestUri = explode('/', $uri);

$controller = array_shift($requestUri);

if($controller == 'admin') {
    $controller = array_shift($requestUri);
}
$controller = ucfirst(strtolower($controller));

$action = array_shift($requestUri);

$params = $requestUri;
define('BASE_URL', $controller . DIRECTORY_SEPARATOR . $action . DIRECTORY_SEPARATOR);

$app = new \App($controller, $action, $params);
$app->run();


