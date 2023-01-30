<?php

class ControladorPadre{
    public static function recurso(){
        if(isset($_SERVER['PATH_INFO'])){
            $uri = $_SERVER['PATH_INFO'];
            $uri = explode('/',$uri);
            return $uri;
        }else{
            //retorno error del api
            ControladorPadre::respuesta(array('HTTP/1.1 404 No se ha indicado el recurso'));
        }
    }
    protected function parametros(){
        $uri = $_SERVER['QUERY_STRING'];
        
        print_r($uri);
        return $uri;
    }


    public static function respuesta($datos,$httpHeaders=array()){
        foreach ($httpHeaders as $value) {
            header($value);
        }
        echo $datos;
        exit;

    }
}

?>