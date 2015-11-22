<?php

namespace Controllers;

class MasterController extends \HTTP\HttpContext {

    /**
     *
     * @var \View
     */
    protected $view;
    protected $controller;
    protected $action;
    protected $params = array();

    protected $custom;

    public function __construct(\View $view, $controller) {
        
        $this->view = $view;
        
        $this->controller = $controller;
               
    }



    public function view() {
        $url = \explode('/', trim($_SERVER["REQUEST_URI"], '/') );
        $controller = $url[1];
        $action = $url[2];
        if ($controller == null) {
            $controller = 'home';
        }
        if ($action == null) {
            $action = 'index';
        }
        $url = DIRECTORY_SEPARATOR . $url[0];
        $url .= '/' . $controller . '/' . $action;
        //var_dump($url);

        $view = 'Views/' . $controller . '/' . $action . '.php';
        require_once $view;
    }

    public function redirectControllers($controller, $action) {
        
        $url = \explode('/', \trim($_SERVER['REQUEST_URI'], '/'));
        $url = DIRECTORY_SEPARATOR . $url[0];
        
        $url .= '/' . $controller . '/' . $action;
        //include '/views/' . $view . '.php';
        header("Location: " . $url);
        exit;
    }
    
    public function redirectAdminControllers($controller, $action) {
        
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $url = DIRECTORY_SEPARATOR . $url[0] . DIRECTORY_SEPARATOR . $url[1];
        
        $url .= DIRECTORY_SEPARATOR . $controller . '/' . $action;
        //include '/views/' . $view . '.php';
        header("Location: " . $url);
        exit;
    }

    public function includeView($view) {

        include_once '/Views/' . $view . '.php';
    }

    public function includeControllerAction($action) {
        $url = \explode('/', \trim($_SERVER["REQUEST_URI"], '/') );
        
        $controller = $url[1];

        include DIRECTORY_SEPARATOR. 'Views' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php';
    }
    
    public function redirectViews($action){
        
        $var = $action;
        header('Location: ' . $var);
        exit;
    }

    /**
     * @param $name
     * This method include header or footer
     */
    
    public function part($name) {
        include 'Views/Master/' . $name . '.php';
    }
    
    
    public function escape($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
    }

}
