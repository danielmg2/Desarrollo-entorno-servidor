<?php
    $dom= new DOMDocument("1.0","utf-8");
    $raiz= $dom->createElement("Mundial");
    $dom->formatOutput=true;
    $dom->appendChild($raiz);

    //Elementos equipo
    $equipo=$raiz->appendChild($dom->createElement("Equipo"));
    $equipo->appendChild($dom->createElement("Nombre", "España"));
    $equipo->appendChild($dom->createElement("Entrenador", "Luis Enrique"));
    $equipo=$raiz->appendChild($dom->createElement("Equipo"));
    $equipo->appendChild($dom->createElement("Nombre", "España"));
    $equipo->appendChild($dom->createElement("Entrenador", "Luis Enrique"));


    //Guardamos el dom en un documento
    if($dom->save('mundi.xml')){
        echo "Todo Correcto";
    }else{
        echo "ERROR";
    }

?>