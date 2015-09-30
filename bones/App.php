<?php


class App {
    
    private $controller = 'home';
    private $action = 'index';
    private $params = [];
    
    private $classController;
    private $admin = false;
    
    function __construct($controller, $action, $params) {
        $this->controller = $controller;
        
        if(empty($this->controller)){
            $this->controller = 'home';
        }
        if ($this->controller == 'Page') {
            $this->admin = true;
        }
        
        $this->action = $action;
        if($action == null) {
            $this->action = 'index';
        }
        $this->params = $params;
    }
     
    private function setController(){
        $area = '';
        //$view = new View($this->controller, $this->action);
        if ($this->admin) {
            $area = 'Admin\\';
        }
        $controller = '\Controllers\\' . $area . ucfirst(strtolower($this->controller)) . 'Controller';
        $this->classController = new $controller($this);
    }
    
    public function run(){
        $this->setController();
        call_user_func_array(array($this->classController, $this->action), $this->params);
    }
}