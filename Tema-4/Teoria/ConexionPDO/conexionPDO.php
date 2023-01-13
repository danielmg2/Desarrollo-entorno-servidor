<?php
require('./seguro/conexion.php');

//Conexion
try{
    $conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);
    echo $conexion->getAttribute(PDO::ATTR_SERVER_INFO);
    echo "<br>";
    echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
    // echo "<br>";
    echo "Conexion correcta";
    // $sql= " select * from equipo ";
    $sql="insert into equipo values(7,'Brasil');";
    $numero = $conexion->exec($sql);
    echo "Se ha insertado ".$numero;
    $resultado=$conexion->query($sql);
    echo "<br> Numero de equipos ".$resultado->rowCount();
    while($row =$resultado->fetch(PDO::FETCH_BOTH)){
        echo "<pre>";

    }

$conexion = new PDO('mysql:host='.HOST.';dbname='.BBDD, USER, PASS);
$sql= "insert into equipo values (:id,:nombre);";
$preparada= $conexion->prepare($sql);
$id=9;
$nombre='Argentina';
$preparada->bindParam(1,$id);
// $preparada->bindparam(2,$nombre);
$array=array(":nombre"=>"China","id"=>16);
$preparada->execute($array);

$sql= " select * from equipo where id = :id";
$preparada = $conexion->prepare($sql);
$array = array(":id"=>1);
$preparada->execute($array);
//Insertar en variables
$preparada->bindColumn(1,$id);
$preparada->bindColumn(2,$nombre);
while($row = $preparada->fetch(PDO::FETCH_BOUND)){
    echo "<br> ".$id.":".$nombre;
}
//transacciones
$miDb->beginTransaction();
$resultadoConsulta1 = $miDB->exec('');
}catch(Exception $ex){
    
}finally{
    unset($conexion);
}

?>