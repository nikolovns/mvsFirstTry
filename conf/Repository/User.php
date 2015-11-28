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
        $query = "SELECT username, password, id, role_id
                  FROM users
                  WHERE username = ?
                  AND password = ?";

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
        $query = "SELECT username, password, role_id, id FROM users WHERE id = ?";
        $this->db->query($query, [$id]);

        $result = $this->db->row();
        return new \Models\UsersModel(
            $result['username'], $result['password'], $result['role_id'], $result['id']
        );
    }

    public function editUserId($id) {
        $query = "update users set role_id = 2 WHERE id = ?";
        $this->db->query($query, [$id]);

        $result = $this->db->row();
        return new \Models\UsersModel(
            $result['username'], $result['password'], $result['role_id'], $result['id']
        );
    }


    public function getAll() {
        $query = "SELECT id, username FROM users";
        $this->db->query($query);

        $result = $this->db->fetchAll();
        $allUsers = [];

        foreach ($result as $value) {
            $allUsers[] = new \Models\UsersModel(
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
    public function save(\Models\UsersModel $user) {
        $query ='INSERT INTO users(username, password )
                VALUE (?, ?)';

        $param = [
            $user->getUsername(),
            $user->getPassword()
        ];

        $this->db->query($query, $param);
        return $this->db->row();
    }

    public function getCheck($className) {
        $query = "SELECT 1 FROM $className LIMIT 1";

        $this->db->query($query);
        $result = $this->db->fetchAll();
        return $result;
    }

    public function createTable($class, $properties = []) {

        $constrain = [

            "CONSTRAINT fk_user_info_users FOREIGN KEY (user_id)
            REFERENCES conf.users (id))",
            "CONSTRAINT fk_users_roles FOREIGN KEY (role_id)
            REFERENCES conf.role (id))"
        ];

        $query = "CREATE TABLE IF NOT EXISTS `conf`.`$class` ( ";
        foreach ($properties as $value) {

            foreach ($value as $valueKey => $valueName) {
                $query .= "$valueKey " ;

                foreach ($value[$valueKey] as $v) {
                    $query .= "$v ";
                }
                $query .= ', ';
            }

        }

        if ($class == "Users") {
            $query .= $constrain[1];
        }
        if ($class == "User_info") {
            $query .= $constrain[0];
        }

        $query .= " DEFAULT CHARACTER SET = utf8";

        $this->db->query($query);
        return $this->db->row();
    }
}
