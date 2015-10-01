<?php

class View {

    protected $controller;
    protected $action;

    public function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
        if ($this->action == null) {
            $this->action = 'index';
        }
    }

    public function showView() {
        $var = 'Views' . DIRECTORY_SEPARATOR . $this->controller . DIRECTORY_SEPARATOR . $this->action . '.php';
        require_once $var;
    }

    public function part($name) {
        include 'Views/Default/templateHTML/' . $name . '.php';
    }
    
    public function url(
            $controller = null,
            $action = null,
            $params = []
            ){
        $requstURI = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $root = array_shift($requstURI);
        $uri = '//' . $_SERVER['HTTP_HOST'] . '/' . $root;
        $uri = "$uri";
        //var_dump($uri); exit;
        if($controller) {
            $uri .= '/' .$controller;
        }
        if($action) {
            $uri .= '/' . $action;
        }
        if($params) {
            foreach ($params as $key => $value) {
                $uri .= "/$value";
            }
        }
        
        return $uri;
    }
    
    public function adminUrl(
            $controller = null,
            $action = null,
            $params = []
            ){
        $requstURI = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $root = array_shift($requstURI);
        $admin = array_shift($requstURI);
        $uri = '//' . $_SERVER['HTTP_HOST'] . '/' . $root . '/' . $admin;
        $uri = "$uri";
        
        //var_dump($uri); exit;
        if($controller) {
            $uri .= '/' .$controller;
        }
        if($action) {
            $uri .= '/' . $action;
        }
        if($params) {
            foreach ($params as $key => $value) {
                $uri .= "/$value";
            }
        }
        
        return $uri;
    }
    
    /**
     * 
     * @param type $text
     * @return string
     */
    public function escape($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
    }
    
}
