<?php
require './controlador/controladorPadre.php';
require './controlador/ConciertosControlador.php';
require './modelo/concierto.php';
require './dao/conciertoDAO.php';
// require './modelo/conciertoDAO.php';
$recurso = ControladorPadre::recurso();
if($recurso){
    if($recurso[1] == 'conciertos'){
        $controlador = new ConciertosControlador();
        $controlador->controlador();
    }
}


?>