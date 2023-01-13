<?php
require('./ejecutarScript.php');
require('./conexionBD.php');

if(isset($_REQUEST['crear'])){
    crearBase();
    header('Location: ./index.php');
    exit();    
}



if(isset($_REQUEST['leer'])){
    header('Location: ./leerTabla.php?accion=leer');
    exit();    
}
    

if(isset($_REQUEST['editar'])){
    header('Location: ./insertar.php?accion=insertar');
    exit();
}


if(isset($_REQUEST['modificar'])){
    // header('Location: ./editar.php?accion=modificar&id='.$_REQUEST['clave']);
    header('Location: ./user/editar.php?id='.$_REQUEST['clave']);
    exit();
}


if(isset($_REQUEST['borrar'])){
    // header('Location: ./leerTabla.php?accion=borrar&valor='.$_REQUEST['clave']);
    header('Location:./admin/borrar.php?id='.$_REQUEST['clave']);
    exit();
}

if(isset($_REQUEST['buscar'])){
    header('Location: ./leerTabla.php?accion=buscar&valor='.$_REQUEST['clave']);
    exit();
}
?>