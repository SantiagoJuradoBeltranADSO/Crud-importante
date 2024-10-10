<?php
namespace sena\libs;

use PDO;

class Database{
    private $connection;
    public function __construct()
    {
    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]; 
    $this->connection ="mysql:host=" . constant('HOST').";dbname=". constant('DB') .";
    charsert=" . constant("CHARSET");
    $this->connection = new PDO($this->connection, constant('USER'), constant('PASSWORD'), $option);
    $this->connection->exec("SET CHARACTER SET UT8");
    }

public function getConnection(){
    return $this -> connection;
}
public function closeConnection(){
    $this->connection= null;
} 
}