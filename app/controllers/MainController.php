<?php
namespace sena\controllers;

use sena\libs\Controller;

/**
 * Clase MainController
 *
 * Este controlador maneja las operaciones relacionadas con la página principal
 * de la aplicación. Su objetivo principal es renderizar la vista de inicio.
 */
class MainController extends Controller
{
    /**
     * Constructor de la clase MainController.
     *
     * Actualmente no inicializa ninguna propiedad ni ejecuta ningún método.
     */
    public function __construct()
    {}

    /**
     * Método para mostrar la vista principal de la aplicación.
     *
     * Este método renderiza la vista de inicio de la aplicación.
     */
    public function index()
    {
        // Renderiza la vista 'home' utilizando el layout 'app'.
        $this->view('home', 'app');
    }
}