<?php

namespace Models;

class UserModels  {
    
    protected $id;
    protected $username;
    protected $password;
    
    
    public function __construct($username, $password, $id = null) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPasword($password);
        
    }
            
    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPasword($password) {
        $this->pasword = $password;
    }

    function getId() {
        return $this->id;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPasword() {
        return $this->pasword;
    }
    
    public function save(){
        return \Repository\User::createInstance()->save($this);
    }
    
}
