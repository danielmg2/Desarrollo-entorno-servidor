<?php
require('./conexionBD.php');



function crearBase(){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS);
        $script = file_get_contents('./Peliculas.sql');
        mysqli_multi_query($conexion,$script);
        
    
    }catch(Exception $ex)
    {
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
    }finally{
        mysqli_close($conexion);
    }
}

?>