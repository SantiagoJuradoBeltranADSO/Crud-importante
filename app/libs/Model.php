<?php

namespace sena\libs;

class Model {
    protected $db;
    protected $connection;
    protected $allowedTables = ['users', 'products', 'orders']; // Ejemplo de tablas permitidas

    public function __construct() {
        // Crear una nueva instancia de la conexión
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    /**
     * Método para seleccionar todos los registros de una tabla.
     *
     * @param string $table El nombre de la tabla de la cual se desean seleccionar los registros.
     * @return array Un arreglo con todos los registros de la tabla.
     */
    public function select($table = "") {
        // Verifica si la tabla está en la lista de tablas permitidas
        if (!in_array($table, $this->allowedTables)) {
            die("Tabla no permitida: $table");
        }

        try {
            $stm = $this->connection->prepare("SELECT * FROM $table");
            $stm->execute();
            return $stm->fetchAll();
        } catch (\PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
 /**
 * Obtiene un registro de la base de datos por su ID.
 *
 * Este método realiza una consulta a la base de datos para obtener un registro
 * de la tabla especificada utilizando el ID proporcionado. 
 * 
 * @param string $table El nombre de la tabla de la cual se desea obtener el registro.
 * @param mixed $id El ID del registro que se desea recuperar. Puede ser un entero o una cadena.
 *
 * @return array|false Devuelve un array asociativo que representa el registro encontrado
 *                     o false si no se encuentra ningún registro.
 *
 * @throws PDOException Si ocurre un error en la consulta a la base de datos.
 */
public function getById($table = "", $id)
{
    // Prepara la consulta SQL
    $stm = $this->connection->prepare("SELECT * FROM $table WHERE id = :id");
    // Asigna el valor del ID al parámetro de la consulta
    $stm->bindValue(":id", $id);
    // Ejecuta la consulta
    $stm->execute();
    // Retorna el registro encontrado o false si no se encuentra
    return $stm->fetch();
}
}