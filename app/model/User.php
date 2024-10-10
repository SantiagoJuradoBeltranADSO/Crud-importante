<?php 
namespace sena\model;

use sena\libs\Model;

class User extends Model {
    protected $table = "users"; // Nombre de la tabla en la base de datos

    public function __construct() {
        parent::__construct(); // Llama al constructor de la clase base 'Model'
    }

    public function getUsers() {
        // Llama al método 'select' de la clase base 'Model' para obtener los usuarios
        return $this->select($this->table);
    }
    public function getUser($id){
        return $this ->getByid($this->table, $id);

    }
}