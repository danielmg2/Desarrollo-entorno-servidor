<?php
require ('./seguro/conexion.php');



//SELECT
function primeraConsulta(){
    try{

        //Se lee toda la tabla
        $conexion = mysqli_connect(HOST,USER,PASS);
        $sql = 'Select * from pelicula;';
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        mysqli_stmt_execute($consulta_Preparada);
        echo mysqli_stmt_num_rows($consulta_Preparada);


        //Ver el select
        mysqli_stmt_bind_result($consulta_Preparada,$r_id,$r_nombre,$r_puntuacion,$r_fecha);
        while(mysqli_stmt_fetch($consulta_Preparada)){
            echo "<br> ID: ". $r_id.",Nombre: ".$r_nombre. ", Puntuación: ".$r_puntuacion."Fecha: ".$r_fecha;
        }
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}



//SELECT....WHERE *
function consulta($valor){
    try{
        //Se lee toda la tabla
        $conexion = mysqli_connect(HOST,USER,PASS);
        $sql = 'Select * from pelicula;';
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        $nombre= $valor;
        mysqli_stmt_bind_param($consulta_Preparada,'s',$nombre);
        mysqli_stmt_execute($consulta_Preparada);
        echo mysqli_stmt_num_rows($consulta_Preparada);

        //Ver el select
        mysqli_stmt_bind_result($consulta_Preparada,$r_id,$r_nombre,$r_puntuacion,$r_fecha);
        while(mysqli_stmt_fetch($consulta_Preparada)){
            echo "<br> ID: ". $r_id.",Nombre: ".$r_nombre. ", Puntuación: ".$r_puntuacion."Fecha: ".$r_fecha;
        }
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}


//INSERT
function inserta($id,$nombre,$puntuacion,$fecha){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS);
        $sql='insert into pelicula values(?,?,?,?);';
        $consulta_Preparada=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
    
    
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}


//UPDATE
function actualiza(){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS);
    
    
    
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}



//DELETE
function borra(){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS);
    
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}


