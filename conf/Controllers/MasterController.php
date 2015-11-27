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

//        var_dump($this->getRequest());

//        var_dump($this->regMethod());


//        $reflector = new \ReflectionClass($controller);
//        $a = $reflector->getMethod($action)->getParameters();
////$this->action = $action;
//        if(isset($a)) {
//            var_dump($a[0]->name);
//
//            $binding = new \BindingModels\Extract();
//            $binding->regMethod();
//            $con = $binding->regMethod();
//            $con = new $con($this->params);
//            $this->params = $con;
//            $this->action = $action;
//
//
////
//        }
//        $this->context = $context;

//        $this->params = $params;

//var_dump($this->onDispatch("$params"));

//        $this->params = $params("$this->testAction()");



//        var_dump($this->params);
//        $this->params = $params;
//
//        $binding = new \BindingModels\Extract();
//            $binding->regMethod();
//
//            if($binding->regMethod()) {
//
//                $con = 'BindingModels\\' . $this->action;
//                $con = new $con();
//                $this->params[] = $con;
//            } else {
//                $this->params = [];
//            }
//        var_dump($this->params);
//        echo '<br />';

//        $this->params = $params;
//        var_dump($this->params);
//
//        $this->methods = $action;
//
        $args = func_get_args();
//        var_dump($args);
               
    }




//    function setParams($params) {
//
////        var_dump($reflect);
//        $this->params = $params;
//    }



//    /**
//     * @return mixed
//     */
//    public function getController()
//    {
//
//        return $this->controller;
//    }
//
//    /**
//     * @param mixed $controller
//     */
//    public function setController($controller)
//    {
//        $binding = new \BindingModels\Extract();
//            $binding->regMethod();
//
//            if($binding->regMethod()) {
//
//                $con = 'BindingModels\\' . $this->action;
//                $con = new $con();
//                $this->params[] = $con;
//            } else {
//                $this->params = [];
//            }
//        $this->controller = $controller;
//    }



    public function headerData() {
//        session_start();
        $page = \Repository\Page::createInstance()
            ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
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
