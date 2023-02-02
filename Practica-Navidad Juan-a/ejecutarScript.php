<?php
// require ('seguro/conexionBD.php');

// try{
//     $conexion = mysqli_connect(HOST,USER,PASS);
//     $script = file_get_contents('./BBDD/camisetas.sql');
//     mysqli_multi_query($conexion,$script);
//     mysqli_close($conexion);

// }catch(Exception $ex)
// {
//     echo mysqli_connect_errno();
//     echo mysqli_connect_error();
// }


function crearBase(){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS);
        $script = file_get_contents('./BBDD/camisetas.sql');
        mysqli_multi_query($conexion,$script);
        // mysqli_close($conexion);
    
    }catch(Exception $ex)
    {
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
    }finally{
        mysqli_close($conexion);
    }
}
?>