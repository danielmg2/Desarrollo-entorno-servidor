<?php
$dom=new DOMDocument();
$dom->load('departamento.xml');

echo "Fichero<br>";
//Leer la raiz
$raiz= $dom->childNodes[0];
echo "Raiz: ".$raiz->nodeName;
//Número de hijos de la raiz
echo "tiene ".$raiz->childNodes->length." Hijos";
//Recorrer los hijos
foreach($raiz->childNodes as $elementos){
    if($elementos->nodeType==1){
        echo "<br> Un hijo que es: ".$elementos->nodeName;
        foreach ($elementos->childNodes as $datos) {
            if($elementos->nodeType == 1){
                echo "<br>&nbsp;&nbsp;&nbsp;Un hijo que es: ".$datos->nodeName ." y valor: ".$datos->nodeValue;
            }
        }

    }
}
?>