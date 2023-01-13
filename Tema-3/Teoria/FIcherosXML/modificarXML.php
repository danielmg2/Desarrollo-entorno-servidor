<?php
//Cambiar el entrenador de francia por joau
$dom=new DOMDocument();
$dom->load('mundial.xml');
$raiz=$dom->childNodes[0];
$nuevo->nodeValue="JOAO";
$cambiar=false;

foreach($raiz->childNodes as $elementos){
    if($elementos->nodeType==1){
        foreach ($elementos->childNodes as $datos) {
            if($datos->nodeType==1 && $datos->nodeValue=='Francia'){
                $cambiar=true;
            }
            if($cambiar==true && $datos->nodeName=='Entrenador'){
                $elementos->replaceChild($nuevo,$datos);
            }
        }
    }
}
if($dom->save('mundial.xml')){
    echo "Guardado";
}

//Leer el documento para cargar el dom

//Buscar la etiqueta nombre que tenga de valor Francia y cambiarle el value por Joau y por ultimo salvar el documento

// $nombres=$dom->getElementsByTagName('Nombre');
// foreach ($nombres as $nombre) {
//     if($nombre->nodeValue=='Francia'){
//         $nombre->nextElementSibling->nodeValue="Maria";
//     }
// }

// if($dom->save('mundi.xml')){
//     echo "Todo bien";
// }




?>