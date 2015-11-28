<?php

use BindingModels\Extract;

class App {
    
    protected $controller = 'home';

    private $action = 'index';

    private $params = [];
    
    private $classController;

    private $admin = false;

    private $view;

    private $context;
    
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

    }

    public function getView() {
        return $this->view = new View($this->controller, $this->action, $this->context);
    }
     
    private function setController(){

        $view = $this->getView();
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

        $checkUserIdentity = new \Controllers\IdentityController();
        $checkUserIdentity->getUserModel();

        $config = new \Config\Route();
        $config->runs();

        if(!$config->getCustomRoute()) {

            $this->setController();
            call_user_func_array(array($this->classController, $this->action), $this->params);

        }
    }

}
