<?php

class AutoLoad {
    public function __construct() {
        
        spl_autoload_register(function ($class){
            $pathParam = explode('\\', $class);
            $path = implode(DIRECTORY_SEPARATOR, $pathParam);
            require_once $path . '.php';
        });
    }
}
