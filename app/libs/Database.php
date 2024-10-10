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
        
        // Asegúrate de que CHARSET esté bien definido como 'utf8' o 'utf8mb4'
        $this->connection = "mysql:host=" . constant('HOST') . ";dbname=" . constant('DB') . ";charset=" . constant("CHARSET");
        
        // Crea la conexión a la base de datos
        $this->connection = new PDO($this->connection, constant('USER'), constant('PASSWORD'), $option);
        
        // Cambia UT8 por utf8 o utf8mb4
        $this->connection->exec("SET CHARACTER SET utf8");
    }

    public function getConnection(){
        return $this->connection;
    }
    
    public function closeConnection(){
        $this->connection = null;
    } 
}