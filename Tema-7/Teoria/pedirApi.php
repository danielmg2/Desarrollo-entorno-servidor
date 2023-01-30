<?php

    $url ='https://datos.madrid.es/egob/catalogo/300600-0-comisaria.json?distrito_nombre=VILLAVERDE';

    $datos = file_get_contents($url);


    // print_r($datos);

    // if($datos){
    //     $array = json_decode($datos);
    //     foreach($array['@graph'] as $evento){
    //         print_r($evento);
    //         echo $evento['title'];
    //         echo "<br>";
    //     }
    // }


    if($datos){
        $array = json_decode($datos, true);
        foreach ($array['@graph'] as $evento) {
            //print_r($evento); 
            echo '<br>';
            echo $evento['title'];
            echo "<br>".$evento['location']['latitude'].',' .$evento['location']['latitude'];
        }
    }


?>

<!-- Clave Zamora: -->
<!--  "Key": "303121", -->


<!-- N80aDXLfQnfRczkqPgbifxQQ9Vt5z9EX -->

<!-- 2CTaquYcvvtQ8o0fpm6AEv3AjBBni1WX  -->