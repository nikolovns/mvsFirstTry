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
        include 'Views/Master/' . $name . '.php';
    }

}
