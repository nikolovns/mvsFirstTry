<?php

namespace BindingModels;

class Extract {

    private $view;
    private $controller;
    private $action;
    private $params = [];

    private $model = true;

    public function regMethod() {

        $uri = $_GET['uri'];
        $uri = trim($uri, '/');
        $requestUri = explode('/', $uri);

        $controller = array_shift($requestUri);

        $controller = ucfirst($controller);

        $this->controller = $controller;

        if($controller == 'Admin') {
            $controller = array_shift($requestUri);
            if($controller == null) {
                $controller = 'Home';
            }
//            var_dump($controller);
            $controller = 'Admin\\' . ucfirst(strtolower($controller));
            $this->controller = $controller;
        }

        $action = array_shift($requestUri);

        $this->action = $action;

        if($this->action == null) {
            $this->action = 'index';
        }
//        var_dump($this->action);
        //$params = $requestUri;

        $this->view = new \View($this->controller, $this->action);
//        var_dump($this->view);
        $register = 'BindingModels\\' . ucfirst($this->action);
//var_dump($register);
        if(!file_exists($register . '.php')){
//            var_dump(1111111);
            $this->model = false;
            return $this->model;
        }

        $register = new $register();
        $obj = $this->extract($register);
        $className = 'Controllers\\' . $this->controller . 'Controller';
        $controller = new $className($this->view, $this->controller, $obj);
//        var_dump($obj);
        $methods = get_class_methods($className);

        foreach ($methods as $method) {
            if($method === $this->action) {
                $controller->$method($obj);
                break;
            }
        }

        return $this->model;

//        $controller->register($obj);
    }

    /**
     * @param $object
     * @return mixed
     * @throws \Exception
     */
    public function extract($object)
    {
        if (!is_object($object)) {
            throw new \Exception('Bad');
        }

        $objectClass = get_class($object);

        $objectInstance = new $objectClass();
        $methods = get_class_methods($object);

        /**
         * Get submit button name (from form)
         */
        $submitButton = str_replace('BindingModels\\', '', $objectClass);
        $submitButton = strtolower($submitButton);

        if (isset($_POST[$submitButton])) {
            foreach ($methods as $method) {
                if (strpos($method, 'set') === 0) {
                    $attribute = substr($method, 3);
                    $attribute = lcfirst($attribute);
                    $objectInstance->$method($_POST[$attribute]);

                }
            }
        }
//        var_dump($objectInstance);
        return $objectInstance;
    }

}