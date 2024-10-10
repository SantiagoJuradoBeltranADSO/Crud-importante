<?php
namespace sena\controllers;

use sena\libs\Controller;

/**
 * Clase UsersController
 *
 * Este controlador maneja las operaciones relacionadas con los usuarios,
 * incluyendo la recuperación de datos de los usuarios y la renderización
 * de las vistas correspondientes.
 */
class UsersController extends Controller
{
    // Almacena el modelo de usuario
    protected $model = "";

    /**
     * Constructor de la clase UsersController.
     *
     * En el constructor, se inicializa el modelo de usuario
     * utilizando el método model() heredado de la clase Controller.
     */
    public function __construct()
    { 
        // Se establece el modelo a la clase 'User' para que pueda ser utilizado
        // en otros métodos de este controlador.
        $this->model = $this->model('User');
    }

    /**
     * Método para mostrar la lista de usuarios.
     *
     * Este método recupera todos los usuarios utilizando el modelo
     * y luego renderiza la vista correspondiente.
     */
    public function index()
    {
        // Obtiene la lista de usuarios desde el modelo.
        $users = $this->model->getUsers();
        
        // Se prepara el array de datos que se pasará a la vista.
        $data = ['users' => $users];

        // Renderiza la vista 'users/index' pasando los datos de los usuarios.
        $this->view('users/index', $data, 'app');
    }
    public function edit($id) {
        // Si $id es un array, accede al primer elemento
        
        if (is_array($id)) {
            
            $id = $id[0];
        }
        var_dump($id);
        
        $user = $this->model->getUser($id);
        $data = [
            'title' => "editar usuario",
            'user' => $user
        ];
        $this->view('users/edit',$data,'app');
    }
    public function update(){
        echo "<pre>";
        print_r($_REQUEST); // Usar print_r para imprimir el contenido de $_REQUEST
        echo "</pre>";
    }
}