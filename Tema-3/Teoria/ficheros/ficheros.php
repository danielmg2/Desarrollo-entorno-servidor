<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros</title>
</head>
<body>
<?php
    //Abrir un fichero SI EXISTE
    //SI se va a abrir para lectura con r
    //Comprobar que existia antes

    //Leer:
    if(!file_exists('miarchivo.txt')){
        echo "<br>No Existe";
    }else{
        echo "<br>existe";
        if(!$fp = fopen('miarchivo.txt','r')){
            echo "<br>Ha habido un error al abrir el archivo";
        }else{
            $leido = fread($fp,filesize('miarchivo.txt'));
            echo "<br>".$leido;
            fclose($fp);
        }
    }
    ?>
    <h1>LEER LINEA POR LINEA</h1>
    
    <?php

    //LEER LINEA POR LINEA
    if(!file_exists('miarchivo.txt')){
        echo "<br>No Existe";
    }else{
        echo "<br>existe";
        if(!$fp = fopen('miarchivo.txt','r')){
            echo "<br>Ha habido un error al abrir el archivo";
        }else{
            //Mientras pueda leer una linea en el fichero
            while($lea = fgets($fp,filesize('miarchivo.txt'))){
                echo "<br>";
                echo $lea;
            }
        }
    }
    fclose($fp);



    //ESCRIBIR
    //Abrir el fichero para W

    if($fp = fopen('mifichero.txt','w')){
        $escribir = '08/11/22';
        fwrite($fp,$escribir,strlen($escribir));
        fclose($fp);
        echo "<br>Se ha escrito";
    }else{
        echo "<br>Ha habido un error al abrir el fichero";
    }



    //ESCRIBIR en un fichero ya cread
    //Abrir el fichero para W
    if($fp = fopen('miarchivo.txt','a')){
        $escribir = '08/11/22';
        fwrite($fp,$escribir,strlen($escribir));
        fclose($fp);
        echo "<br>Se ha escrito";
    }else{
        echo "<br>Ha habido un error al abrir el fichero";
    }


// Cambia la fecha e 22 a 2022
// replace str_replace
// r+


if(!file_exists('miarchivo.txt'))
    echo "<br> No existe";
else{
    echo "<br>Existe";
    if(!$fp =fopen('miarchivo.txt','r+')){
        echo "<br>Ha habido un problema al abrir el fichero";
    }else{
        //Leemos
        $leido= fread($fp,filesize('miarchivo.txt'));
        $remplazado= str_replace('/22'.'/2022',$leido);
        fseek($fp,0);
        fwrite($fp,$remplazado,strlen($remplazado));
        fclose($fp);
    }
}





?>    
</body>
</html>