<?php

use BindingModels\Extract;

class App {
    
    private $controller = 'home';
    private $action = 'index';
    private $params = [];
    
    private $classController;
    private $admin = false;

    private $view;

    private $context;
    private $request;
    private $post;
    
    function __construct($controller, $action, $params = []) {
        
        if(!empty($controller)){
            $this->controller = $controller;
        }

        if($this->controller === 'Admin\\') {
            $this->admin = true;
        }

        if(!empty($action)) {
            $this->action = $action;
        }

        $binding = new Extract();
        $binding->regMethod();
//        if($binding->regMethod()) {
//            $con = 'BindingModels\\' . $this->action;
//            $con = new $con();
//            $this->params[] = $con;
//        } else {
//            $this->params = [];
//        }

    }

    public function getView() {
        return $this->view = new View($this->controller, $this->action, $this->context);
    }

//    public function getForm() {
//        return $this->post = new \HTTP\Form($_POST);
//    }
//
//    public function getRequest() {
//        return $this->request = new \HTTP\HttpRequest($this->getForm());
//    }
//
//    public function getContext() {
//
//        return $this->context = new \HTTP\HttpContext($this->getRequest());
//    }
     
    private function setController(){

        $view = $this->getView();
//        $context = $this->getContext();
        $params = $this->params;
        $admin = '';
        if($this->admin === true) {
            if($this->controller == 'Admin\\') {
                $this->controller .= 'Home';
            }
        }
        // no directory_separator
        $controller = 'Controllers\\' . ucfirst($this->controller) . 'Controller';
        $this->classController = new $controller($view, $controller);


    }

    public function run() {





        $config = new \Config\Route();
        $config->runs();


        if(!$config->getCustomRoute()) {
//            var_dump($this->classController);
            $this->setController();
            call_user_func_array(array($this->classController, $this->action), $this->params);
//            $binding = new Extract();
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
//            var_dump($this->params);
//            var_dump($this->classController);


        }
    }

}
