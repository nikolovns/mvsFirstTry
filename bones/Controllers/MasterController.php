<?php

namespace Controllers;

class MasterController {

    /**
     *
     * @var \View
     */
    protected $view;
    protected $controller;
    protected $action;
    protected $params = [];


    public function __construct(\View $view, $controller) {
        
        $this->view = $view;
        
        $this->controller = $controller;
        
        
        $this->onLoad();
    }
    
    protected $views_dir;
    protected $layout;
    
//    public function __construct($views_dir = 'Views/Default') {
//        $this->views_dir = $views_dir;
//        $this->layout = DX_ROOT_DIR . 'Views/Default/index.php';
//    }

    public function view() {
        $url = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
        $controller = $url[1];
        $action = $url[2];
        if (empty($controller)) {
            $controller = 'home';
        }
        if (empty($action)) {
            $action = 'index';
        }
        $url = DIRECTORY_SEPARATOR . $url[0];
        $url .= DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action;
        //var_dump($url);

        $view = 'Views' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php';
        require_once $view;
    }

    public function onLoad() {
        
    }

//    public function redirectViews($action) {
//        $url = explode('/', $_SERVER['REQUEST_URI']);
//
//
//        var_dump($url);
//        exit;
//        $var = $action;
//        header('Location: ' . $var);
//        exit;
//    }

    public function redirectControllers($controller, $action) {

        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $url = DIRECTORY_SEPARATOR . $url[0];
        $url .= DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action;
        var_dump($url . '\\' . page . '.php');
        include '/views/' . $view . '.php';
        header("Location: " . $url);
        exit;
    }

    public function includeView($view) {

        include_once '/Views/' . $view . '.php';
    }

    public function includeControllerAction($action) {
        $url = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
        
        $controller = $url[1];


        include DIRECTORY_SEPARATOR. 'Views' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php';
    }
    
    public function redirectViews($action){
        
        $var = $action;
        header('Location: ' . $var);
        exit;
    }
    
    public function part($name) {
        include 'Views/Master/' . $name . '.php';
    }
    
    public function escape($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
    }
    

}
