<?php
error_reporting(E_ALL ^ E_NOTICE);
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
$controller = ucfirst(strtolower($controller));

if($controller == 'Admin') {
    $controller = array_shift($requestUri);
    $controller = 'Admin' . DIRECTORY_SEPARATOR . ucfirst(strtolower($controller));

}

$action = array_shift($requestUri);

$params = $requestUri;

$app = new \App($controller, $action, $params);
$app->run();


