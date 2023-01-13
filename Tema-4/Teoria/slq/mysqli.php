<?php
require ('./seguro/conexion.php');


//Conexion con objetos
// try{
//     $conexionO = new mysqli();
//     $conexionO->connect(HOST,USER,PASS,'mundial');
//     $conexionO->close();

//     mysqli_close($conexion);

// }catch(Exception $ex){
//     echo mysqli_connect_errno();
//     echo mysqli_connect_error();
// }



//Conexion con funciones
try{
    $conexion = mysqli_connect(HOST,USER,PASS,'mundial');
    //Consultar la base de datos
    // $sql='select * from equipo';
    // $resultado=mysqli_query($conexion,$sql);
    // echo "<br>ALL";
   // print_r($resultado->fetch_all());
    // echo "<br>Array";
    // while($row=$resultado->fetch_array()){
    //     print_r($row);
    // }
    
    // while($row=$resultado->fetch_object()){
    //     print_r($row);
    // }
    
//Consultas preparadas:
    //SELECT
    // echo "select";
    //     $sql='Select * from equipo where id = ? and nombre = ?';
    //     $consulta_Preparada= mysqli_stmt_init($conexion);
    //     mysqli_stmt_prepare($consulta_Preparada,$sql);
    //     $id=1;
    //     $nombre='España';

    //     mysqli_stmt_bind_param($consulta_Preparada,'is',$id,$nombre);
    //     mysqli_stmt_execute($consulta_Preparada);
    //     echo mysqli_stmt_num_rows($consulta_Preparada);

    //Ver el SELECT
        // mysqli_stmt_bind_result($consulta_Preparada,$r_id,$r_nombre);
        // while(mysqli_stmt_fetch($consulta_Preparada)){
        //     echo "<br>Id: ".$r_id.",Nombre: ".$r_nombre;
    
        // }



//INSERT
    // $sql='insert into equipo values(?,?)';
    // $consulta_Preparada= mysqli_stmt_init($conexion);
    // mysqli_stmt_prepare($consulta_Preparada,$sql);
    // $id=5;
    // $nombre='Portugal';

    // mysqli_stmt_bind_param($consulta_Preparada,'is',$id,$nombre);
    // mysqli_stmt_execute($consulta_Preparada);
    // echo mysqli_stmt_num_rows($consulta_Preparada);

//UPDATE
    // $sql= 'update equipo set nombre = ? where nombre= \'Japon\' ';
    // $consulta_Preparada= mysqli_stmt_init($conexion);
    // mysqli_stmt_prepare($consulta_Preparada,$sql);
    // // $id=4;
    // $nombre='China';

    // mysqli_stmt_bind_param($consulta_Preparada,'s',$nombre);
    // mysqli_stmt_execute($consulta_Preparada);
    // echo mysqli_stmt_num_rows($consulta_Preparada);

//TRANSACCIONES:
    //SELECT
    echo "Transacciones";
    //Insertar 3 equipos, al ultimo le ponemos el ID mal
    mysqli_autocommit($conexion,false);
    $sql='insert into equipo values(5,\'Alemania\');';
    $sql1='insert into equipo values(6,\'Rusia\');';
    // $sql2='insert into equipo values(6,\'Brasil\'):';
    mysqli_query($conexion,$sql);
    mysqli_query($conexion,$sql1);
    // mysqli_query($conexion,$sql2);
    mysqli_commit($conexion);





}catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    echo $ex->getMessage();
    
}finally{
    mysqli_close($conexion);
}

echo "";

?>