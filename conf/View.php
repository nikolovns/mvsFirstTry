<?php

class View {

    protected $controller;
    protected $action;
    protected $params = [];

    public function __construct($controller, $action, $params = []) {
        $this->controller = $controller;
        if($this->controller == null) {
            $this->controller = 'home';
        }
        
        if($this->controller == 'Admin\\') {
            $this->controller = 'Admin\Home';
        }
        
        $this->action = $action;

        if ($this->action == null) {
            $this->action = 'index';
        }

        $this->params = $params;
    }

    /**
     * Require default view
     */

    public function showView() {
        $controller = str_replace('Controllers\\', '', $this->controller);
        $view = 'Views/' . str_replace('Controller', '', $controller) . '/' . $this->action . '.php';

        require_once $view;
    }


    /**
     * The function showCustomView($class_name) load custom view
     * It will loading custom view like partial view
     * @see Base class showCustomView($controller)
     *
     * @param $custom
     */
    public function showCustomView($custom) {
        $path = 'Views/Custom/';

        $file = fopen($path . $custom . '.php', 'r');
        $content = fgets($file);
        fclose($file);

        preg_match_all('/([A-Z])\w+/', $content, $matches);
        $view = $matches[0][0];
        if($view == $custom) {
            require_once $path . $custom . '.php';
        }
    }

    /**
     * @param $name
     * Require default header or footer
     */
    public function part($name) {
        require_once 'Views/Default/templateHTML/' . $name . '.php';
    }

    /**
     * @param $name
     * Require header or footer for Admin area
     */
    
    public function adminPart($name) {
        require_once 'Views/Admin/Default/templateHTML/' . $name . '.php';
    }
    
    public function url(
            $controller = null,
            $action = null,
            $params = array()
            ){
        $requestURI = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $root = array_shift($requestURI);
        $uri = '//' . $_SERVER['HTTP_HOST'] . '/' . $root;
        //$uri = "$uri";
        
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
        //var_dump($uri);
        return $uri;
    }
    
    public function adminUrl(
            $controller = null,
            $action = null,
            $params = array()
            ){
        $requestURI = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $root = array_shift($requestURI);
        $admin = array_shift($requestURI);
        $uri = '//' . $_SERVER['HTTP_HOST'] . '/' . $root . '/' . $admin;
        $uri = "$uri";
        
        
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
    
    
    public function escape($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
    }
    
}
