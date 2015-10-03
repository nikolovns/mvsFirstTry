<?php

namespace Repository;

class User {

    /**
     *
     * @var \Database\Db
     */
    protected $db;

    /**
     *
     * @var \Repository\User
     */
    protected static $inst;

    private function __construct(\Database\Db $db) {
        $this->db = $db;
    }

    /**
     * 
     * @return User
     */
    public static function createInstance() {
        if (self::$inst == null) {
            self::$inst = new self(\Database\Db::getInstance());
        }
        return self::$inst;
    }

    /**
     * 
     * @param string $username
     * @return \Repository\User
     */
    public function getOneByName($username) {
        $query = "SELECT id, username FROM users WHERE username = ?";
        $this->db->query($query, [$username]);
        $result = $this->db->row();
        return $this->getOneById($result['id']);
    }

    public function getOneByDetails($username, $password) {
        $query = "SELECT username, password, id, admin FROM users WHERE username = ? AND password = ?";
       
        $this->db->query($query, [$username, md5($password)] );
       
        $result = $this->db->row();
        return $this->getOneById($result['id']);
    }
    
    

    /**
     * 
     * @param type $id
     * @return \Repository\User
     */
    public function getOneById($id) {
        $query = "SELECT username, password, admin, id FROM users WHERE id = ?";
        $this->db->query($query, [$id]);

        $result = $this->db->row();
        
        return new \Models\UserModels(
            $result['username'], $result['password'], $result['admin'], $result['id']
        );
    }

    public function getAll() {
        $query = "SELECT id, username FROM users";
        $this->db->query($query);

        $result = $this->db->fetchAll();
        $allUsers = [];

        foreach ($result as $value) {
            $allUsers[] = new \Models\UserModels(
                $value['username'], $value['password'], $value['id']
            );
        }
        return $allUsers;
    }

    /**
     * 
     * @param \Repository\User $user
     * @return type
     */
    public function save(\Models\UserModels $user) {
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $param = [
            $user->getUsername(),
            $user->getPasword()
        ];
        

        $this->db->query($query, $param);
        return $this->db->row();
    }

}
