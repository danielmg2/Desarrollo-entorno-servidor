<?php
echo"<h1>ARRAYS</h1>";
    //vacio
    $meses= array();
    echo var_dump($meses);

    //Con datos
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto", "Septiembre","Octubre","Noviembre","Diciembre");
    echo "<pre>";
    var_dump($meses);
    echo "</pre>";
    
    //longitud
    $dias=array(7);
    echo "<pre>";
    var_dump($dias);
    echo "</pre>";

    //sintaxis corta
    $notas = [2.3,5.3];
    echo "<pre>";
    var_dump($notas);
    echo "</pre>";

    //Acceder o modificar
    echo $meses[2];

    //Contar el número de elementos en un array
    echo "<br>";
    echo count($meses);

    for($i=0;$i<count($meses); $i++)
    {
        #code...
        echo "<br>";
        echo $meses[$i];
    }
    
    //asignar nuevos valores

    $meses[3] = "Martes";
    for($i=0;$i<count($meses); $i++)
    {
        #code...
        echo "<br>";
        echo $meses[$i];
    }
    $meses[5]="domingo";
    echo "<pre>";
    var_dump($meses);
    echo "</pre>";
    echo count($meses);
    for($i=0;$i<count($meses); $i++)
    {
        #code...
        echo "<br>";
        echo $meses[$i];
    }
    echo"<br>";
    echo"<br>";

    foreach($meses as $key)
    {
        echo $key;
        echo"<br>";
    }

    //añadir al final del array
    array_push($meses,"Agosto");
    foreach($meses as $key){
            echo $key;
            echo"<br>";
    }
    
    //Quitar ultimo valor de la pika
    echo"<br>";
    array_pop($meses);
    foreach($meses as $key){
        echo $key;
        echo " ";
    }

    //Quitar un elemento 
    echo"<br>";
    unset($meses[0]);
    echo"<br>";
    array_pop($meses);
    foreach($meses as $key){
        echo $key;
        echo " ";
    }

    print_r($meses);
    echo "<br>";
    $notas = array("cristian"=>7, "Lucia"=>10, "Itziar"=>10,"Manuel"=>10,"Javier"=>9.75);
    print_r($notas);

    echo "<br>Nota ".$notas["Lucia"];


    foreach ($notas as $clave => $value)
    {
        echo "<br>La nota de ". $clave . " es " .$value;
    }


    //Array multidimiensional

    $multi =array(array(),array());
    echo var_dump($multi);

    $asignaturas = array("DAM1"=> array("PROG"=>"Programación","LM"=>"Lenguaje de marcas"),
    "DAW"=>array("DWES"=>"Servidor","DWEC"=>"Cliente"));
    //Recorrer arraysanidados
    foreach($asignaturas as $key=>$value){
        echo "<br> El curso de ".$key. "Cursa las siguientes asignaturas";
        foreach($value as $siglas =>$nombre){
            echo "<br> Asignaturas ".$siglas.": ".$nombre;
        }
    }


    echo "<h1>FUNCIONES</h1>";
    //Current
    echo "Current: ".current($notas);
    echo "<br>";
    echo "End: ".end($notas);
    reset($notas);
    echo "<br>";
    echo "Current: ".current($notas);
    echo "<br>";
    echo "Key: ".key($notas);
    reset($notas);

    //La funcion each no se usa

?>