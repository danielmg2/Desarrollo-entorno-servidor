<?php


//BBDD
require_once('./config/conexionBD.php');
//Funciones
// require_once('./core/funcionesSesiones.php');

//MODELO
require_once('./dao/FactoryBD.php');
require_once('./dao/DAO.php');
require_once('./modelo/Usuario.php');
require_once('./dao/UsuarioDAO.php');

//Controladores
$controladores = array(
    'login'=>'loginController.php'
);
//Vistas
$vistas = array(
    'home'=>'homeView.php',
    'login'=>'loginView.php'
);

?>