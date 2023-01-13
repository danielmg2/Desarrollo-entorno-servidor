<?php
require('./ejecutarScript.php');


if (!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic Realm="Contenido Restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "No autorizado";
    
}else{
    
    if(isset($_REQUEST['borrar'])){

        if($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']){
            header('Location: ./leerTabla.php?accion=borrar&valor='.$_REQUEST['clave']);
            exit();
        }



    }
    
    
    if(isset($_REQUEST['modificar'])){
        
        
        if($_SERVER['PHP_AUTH_USER']=='daniel' && $_SERVER['PHP_AUTH_PW']){
        
            header('Location: ./editar.php?accion=modificar&id='.$_REQUEST['clave']);
            exit();
        }
        
    }
    



}






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
    header('Location: ./editar.php?accion=insertar');
    exit();
}




// ?fichero='.$_REQUEST['fichero']
if(isset($_REQUEST['buscar'])){
    header('Location: ./leerTabla.php?accion=buscar&valor='.$_REQUEST['clave']);
    exit();
}
?>