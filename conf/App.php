<?php

use BindingModels\Extract;

class App {
    
    private $controller = 'home';
    private $action = 'index';
    private $params = [];
    
    private $classController;
    private $admin = false;

    private $view;
    
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
        
        $this->params = $params;
    }

    public function getView() {
        return $this->view = new View($this->controller, $this->action);
    }
     
    private function setController(){

        $view = $this->getView();
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
            $this->setController();

            $binding = new Extract();
            $binding->regMethod();

            if($binding->regMethod()) {
                $con = 'BindingModels\\' . $this->action;
                $con = new $con();
                $this->params[] = $con;
            } else {
                $this->params = [];
            }

            call_user_func_array(array($this->classController, $this->action), $this->params);

        }
    }

}
