<?php

    /*
    Mapear la URL ingresada en el navegador
    1-Controlador
    2-Metodo
    3-Parametro
    Ejemplo: /articulo/actualizar/4
    */

    class Core{
        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        //Constructor
        public function __construct(){
            //print_r($this->getUrl());
            $url = $this->getUrl();

            //buscar en controladores si el controlador existe
            if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')){
                //si existe se setea como controlador por defecto
                $this->controladorActual = ucwords($url[0]);

                //unset indice
                unset($url[0]);
            }

            //requerir el controlador
            require_once '../app/controladores/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //chequear la segunda parte de la url que seria el metodo es decir el indice 1 del arreglo
            if (isset($url[1])){
                if (method_exists($this->controladorActual, $url[1])){
                    //si se cargo chequeamos el metodo
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }

            //para probar traer el metodo
            //echo $this->metodoActual;  
            
            //obtener los posibles parametros
            $this->parametros = $url ? array_values($url) : [];

            //llamar callback con parametros array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }

        public function getUrl(){
            //echo $_GET['url'];

            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }

    