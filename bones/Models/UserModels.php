<?php

namespace Models;

class UserModels  {
    
    protected $id;
    protected $username;
    protected $password;
    protected $admin;




    public function __construct($username, $password, $admin, $id = null) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPasword($password);
        $this->setAdmin($admin);
        
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
    
    function setAdmin($admin) {
        $this->admin = $admin;
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
    
    function getAdmin() {
        return $this->admin;
    }
    
    public function save(){
        return \Repository\User::createInstance()->save($this);
    }
    
}
