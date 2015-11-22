//<?php


class Statement {
    private $stmt;
    
    public function __construct(PDOStatement $stmt) {
        $this->stmt = $stmt;
    }
    
    public function fetch($fetchStyle = \PDO::FETCH_ASSOC) {
        return $this->stmt->fetch($fetchStyle);
    }
    
    public function fetchAll($fetchStyle = \PDO::FETCH_ASSOC) {
        return $this->stmt->fetchAll($fetchStyle);
    }
    
    public function binaryParam($parameter, $variable, $dataType = \PDO::PARAM_STMT) {
        return $this->stmt->bindParam($parameter, $variable, $dataType);
    }
    
    public function execute($parameter){
        return $this->stmt->execute($parameter);
    }
    
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    
}
