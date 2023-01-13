<?php



$dom= new DOMDocument("1.0","utf-8");
$raiz= $dom->createElement("Notas");
$dom->formatOutput=true;
$dom->appendChild($raiz);

if(!$fp=fopen("notas.csv","r")){
    echo "Error al abrir el archivo";
}else{

    while(($fila=fgetcsv($fp,0,';'))!==false){
        foreach ($fila as $numColumna => $columna) {
            if($numColumna==0){
                $nota=$raiz->appendChild($dom->createElement("Alumno"));
                $nota->appendChild($dom->createElement("Nombre",$columna));
            }else{
                $nota->appendChild($dom->createElement("Nota".$numColumna,$columna));
            }
            
        }
    }
    if($dom->save('notas.xml')){
        echo "Todo correcto";
        header('Location: ./LeeFicheroXML.php');
    }else{
        echo "ERROR";
    }
}
?>