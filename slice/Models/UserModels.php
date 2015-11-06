<?php

namespace Models;

class UserModels  {
    
    protected $id;
    protected $username;
    protected $password;
    protected $admin;

    public function __construct($username, $password, $admin = null, $id = null) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setAdmin($admin);
        
    }
  

    
    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = md5($password);
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

    function getPassword() {
        return $this->password;
    }
    
    function getAdmin() {
        return $this->admin;
    }
    
    public function save(){
        return \Repository\User::createInstance()->save($this);
    }
    
}
