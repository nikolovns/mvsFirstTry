<?php

namespace Models;

class UserModels  {
    
    protected $id;
    protected $username;
    protected $password;
    protected $role_id;

    public function __construct($username, $password, $role_id = null, $id = null) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setRoleId($role_id);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }
    
    public function save(){
        return \Repository\User::createInstance()->save($this);
    }
    
}
