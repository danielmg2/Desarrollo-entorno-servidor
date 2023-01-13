<?php
    require('../funcionesBD.php');
    require('../conexionBD.php');
    
    echo "borrar";
    borra($_GET['id']);
    header('Location: ../leerTabla.php?accion=leer');
    exit();  
    
?>