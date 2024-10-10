<?php
namespace sena\libs;
class Core {
 protected $controller = 'MainController';
 protected $method = 'index';
 protected $parameters = [];
 public function __construct()
 {
    $url = $this->getUrl(); // condicional que sobre escribe el valor de un atriuto
    if ($url != "" && file_exists('../app/controllers/'. ucwords($url [0]). 'Controller.php')) {
        $this -> controller = ucwords($url [0]). 'Controller';
        unset($url[0]);
    }
    $obj = $this -> controller;
    $obj = 'sena\controllers\\' . $this->controller; 
    $this->controller = new $obj;
    if (isset($url[1])) {
        if (method_exists($this->controller,$url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        else{
          die("El metodo solicitado no fue programado pague mas...");   
        }
    }
    $this-> parameters = $url ? array_values($url) : [] ;
    call_user_func([$this->controller,$this->method], $this->parameters);
 }

 public function getUrl(){
    //var_dump($_GET['url']);
    $url = "";
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'],'/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/',$url);
    }
    echo"<pre>";
    print_r($url);
    echo"</pre>";
    return $url;

 }
}