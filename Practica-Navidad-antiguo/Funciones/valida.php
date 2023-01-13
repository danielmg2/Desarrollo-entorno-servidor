<?php
session_start();
require ('./funcionesBD.php');
require ('../seguro/conexionBD.php');
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];



// si es admin, se redirige a la pagina principal 
// pasando el valor del perfil por session y se muestra
// lo correspondiente al tipo de usuario
if(validaCredenciales($user,$pass)){

    if(validaUser($user)){
        if($_SESSION['perfil']=='administrador'){
            
            header('Location: ../paginas/inicio.php');
            exit;
            echo $_SESSION['perfil'];
        
        }else if($_SESSION['perfil']=='moderador'){
            
            header('Location: ../paginas/inicio.php');
            exit;
            echo $_SESSION['perfil'];
        
        }else if($_SESSION['perfil']=='usuario'){
            
            header('Location: ../paginas/inicio.php');
            exit;
            echo $_SESSION['perfil'];
        
        }
    
    }else{
        // $_SESSION['error']="No existe el usuario";
        // header('Location: ../index.php');
        // exit;
        echo "error1";
    }
    
}else{
    // $_SESSION['error']="No existe el usuario";
    // header('Location: ../index.php');
    // exit;
    echo "error2";
}



?>