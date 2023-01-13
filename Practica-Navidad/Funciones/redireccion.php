<?php
require ('./funcionesBD.php');
require ('../seguro/conexionBD.php');
session_start();

//si pulso comprar hago las operaciones necesarias para crear una nueva linea en venta y borro los productos comprados del valor de stock
if(isset($_REQUEST['comprar'])){
    //hacer lo necesario para la venta y redireccionar a inicio
    nuevoVenta( $_SESSION['user'],date('y-m-d'),$_REQUEST["clave"],$_REQUEST['cantidad'],$_REQUEST["precio"]);
    header('Location: ../paginas/inicio.php');
    exit();   
}

if(isset($_REQUEST['pedir'])){
   
    nuevoAlbaran(date('y-m-d'),$_REQUEST["clave"],$_REQUEST['cantidad'],$_SESSION['user']);
    header('Location: ../paginas/inicio.php');
    exit();  

      
}


if(isset($_REQUEST['borrar'])){
   
    echo "borrar";
    // echo $_REQUEST['clave'];
    // echo $_REQUEST['tabla'];
    borrar( $_REQUEST['tabla'],$_REQUEST['clave']);
    // header('Location: ../paginas/inicio.php');
    // exit();  

      
}

//Compruebo si he pulsado editar o añadir
if(isset($_REQUEST['modificar'])){
   //una vez se si quiero editar o añadir una linea de la tabla,lo mando por la url acompañado del nombre de la tabla
   
    header('Location: ../paginas/editar.php?accion=modificar&tabla='.$_REQUEST['tabla'].'&clave='.$_REQUEST["clave"].'&claveProd='.$_REQUEST["claveProd"]);
    exit(); 
    echo "modificar" ;

      
}
if(isset($_REQUEST['insertar'])){
    //una vez se si quiero editar o añadir una linea de la tabla,lo mando por la url acompañado del nombre de la tabla
    header('Location: ../paginas/editar.php?accion=insertar&tabla='.$_REQUEST['tabla'].'&clave='.$_REQUEST["clave"]);
    exit(); 
     echo "insertar" ;    
}


if(isset($_REQUEST['editarUSR'])){
    //una vez se si quiero editar o añadir una linea de la tabla,lo mando por la url acompañado del nombre de la tabla
     // header('Location: ../paginas/inicio.php');
     // exit(); 
     echo "editarUSR" ;    
}
if(isset($_REQUEST['nuevoUSR'])){
    header('Location: ../paginas/nuevoUSR.php');
    exit();
}



?>