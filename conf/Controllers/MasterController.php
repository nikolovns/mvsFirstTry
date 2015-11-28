<?php

namespace Controllers;

use HTTP\HttpContext;

class MasterController extends AbstractActionController {

    /**
     *
     * @var \View
     */
    protected $view;

    protected $controller;

    protected $action;

    protected $params = array();

    protected $custom;

    protected $context;

    protected $methods;


    public function __construct(\View $view, $controller) {
        
        $this->view = $view;
        
        $this->controller = $controller;

        $this->context = $this->getContext();

        $this->params = 'BindingModels\\' . $controller;

    }

    /**
     * This method add all created page in navigation bar
     * add header for page
     * TODO
     * the admin can add pages (for everything???)
     */
    public function headerData() {
//        session_start();
        $page = \Repository\Page::createInstance()
            ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }

    /**
     * @param $name
     * This method include header or footer
     */

    public function part($name) {
        include 'Views/Master/' . $name . '.php';
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


    
    public function escape($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
    }



}
