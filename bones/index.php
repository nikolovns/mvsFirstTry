<?php

use \Models;

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


$app = new \App($controller, $action, $params);
$app->run();

//\Database\Db::getInstance()
//        ->query('INSERT INTO users(username, pasword, email) VALUES(?, ?, ?)', ['admin4', 333, 'mail']);

//$user = new Models\UserModels('kiki', 123, 'kikimail');
//$user->save();
//var_dump($user->getEmail());

