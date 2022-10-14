<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <?php
        $datos=array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);
        sort($datos);
        
        // $orden=array();
        // foreach($datos as $key=>$val){
        //     echo"Datos: ".$key."=".$val."\n";
        //     $orden[$key]=$val;
        // }

        //echo var_dump($orden);
        echo "Array Datos ordenado, pero con números repetidos:";
        echo var_dump($datos);
        $arfinal=array();
        $valor=0;
        foreach($datos as $key=>$val)
        {
            
            if($valor!=$val){
                $valor=$val;
                $arfinal[$key]=$val;
            }
        }
        echo "Array Datos ordenado, sin números repetidos:";
        echo var_dump($arfinal);
    
    
    ?>
</body>
</html>