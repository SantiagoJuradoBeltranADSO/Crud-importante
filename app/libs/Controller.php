<?php
namespace sena\libs;

class Controller {
    
    /**
     * Crea una nueva instancia del modelo especificado.
     *
     * Esta función toma el nombre de un modelo, construye el nombre de la clase
     * correspondiente con su espacio de nombres y devuelve una nueva instancia de dicho modelo.
     *
     * @param string $model El nombre del modelo que se desea instanciar (sin el espacio de nombres).
     * @return object Una nueva instancia del modelo correspondiente.
     */
    public function model($model) {
        // Construye el nombre completo de la clase del modelo,
        // incluyendo el espacio de nombres 'sena\model\'.
        $model = 'sena\model\\' . $model;

        // Crea y devuelve una nueva instancia de la clase del modelo
        // utilizando el nombre de clase construido anteriormente.
        return new $model;
    }

    /**
     * Carga y renderiza una vista con su layout correspondiente.
     *
     * Este método utiliza el almacenamiento en búfer para capturar el contenido de la vista
     * y lo incluye dentro del layout especificado.
     *
     * @param string $view Nombre de la vista que se desea renderizar (sin la extensión).
     * @param array $data Datos que se pasarán a la vista.
     * @param string $layout Nombre del layout que se utilizará para envolver la vista.
     */
    public function view($view, $data = [], $layout = 'app') {
        // Inicia el almacenamiento en el búfer de salida.
        ob_start();
        
        // Se agrega la extensión '.view.php' al nombre de la vista.
        $viewFile = '../app/views/' . $view . '.view.php'; 
        
     
        
        // Verifica si el archivo de vista existe en la ruta especificada.
        if (file_exists($viewFile)) {
            // Incluye el archivo de la vista.
            require_once($viewFile);
            
            // Captura el contenido del búfer de salida y lo limpia.
            $content = ob_get_clean(); 
    
            // Incluye el layout, que envolverá la vista renderizada.
            require_once('../app/views/layout/' . $layout . '.layout.php');
        } else {
            // Si la vista no existe, se detiene la ejecución y muestra un error.
            die("La vista $view no existe en la ruta: $viewFile");
        }
    }

 
}