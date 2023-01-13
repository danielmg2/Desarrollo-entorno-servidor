<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>EditarXML</title>
</head>
<body>
    <header>EditarXML</header>
    <?php
        $contFila=0;
        $columna=1;
        $filaMarcada=$_REQUEST["nota"];

        $dom=new DOMDocument();
        $dom->load('notas.xml');
        
        $raiz= $dom->childNodes[0];

        ?>
        <form action="./LeeFicheroXML.php" method ="post" enctype="multipart/form-data">
        <?php

        foreach ($raiz->childNodes as $alumnos ) {
            if($alumnos->nodeType==1){
                $contFila++;
            }
            foreach ($alumnos->childNodes as $notas) {
                if($filaMarcada==$contFila){
                    if($notas->nodeType==1){
                        if($notas->nodeName=="Nombre"){
                            ?>
                            <input type="text" name="nombre" id="NombreAlumno" readonly value="<?php echo $notas->nodeValue?>">
                            <?php
                        }else{
                            ?>
                            <input type="number" name="nota<?php echo $columna?>" id="nota" value="<?php echo $notas->nodeValue?>">
                            <?php
                            $columna++;
                        }
                    }
                }
            }  
        }
        ?>
            <input type="submit" value="Guardar" name="Guardar">
        </form>
</body>
</html>