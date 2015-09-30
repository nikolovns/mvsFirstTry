<?php
namespace Database;

class Db {

    /**
     * @var \PDO
     */
    private $db;
    
    /**
     * @var \PDOStatement
     */
    private $stmt;
    
    /**
     *
     * @var \Database\Db 
     */
    
    private static $inst = null;


    private function __construct($user, $password, $host, $dbName) {
        
        $dsn = 'mysql:host=' . DBConfig::DB_HOST . ';dbname=' . DBConfig::DB_NAME;
        
        $this->db = new \PDO($dsn, DBConfig::DB_USER, DBConfig::DB_PASS);
    }
    
    public static function setInstance($user, $password, $host, $dbName){
        if(self::$inst == null) {
            self::$inst = new self($user, $password, $host, $dbName);
        }
        return self::$inst;
    }
    
    /**
     * 
     * @return \Database\Db
     */
    
    public static function getInstance(){
        return self::$inst;
    }
    
       
    /**
     * 
     * @param type $query
     * @param type $params
     */
    
    public function query($query, array $params = []){
        $this->stmt = $this->db->prepare($query);
        $this->stmt->execute($params);
    }
    
        
    public function fetchAll(){
        return $this->stmt->fetchAll();
    }

    public function row(){
        return $this->stmt->fetch();
    }
    
        
}
