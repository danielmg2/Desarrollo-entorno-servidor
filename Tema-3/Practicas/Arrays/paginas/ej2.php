<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <?php
        $datos= array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);

        echo var_dump($datos);
        foreach($datos as $key=>$val){
            if($val==3){
                $datos[$key]=$key;
            }
        }
        echo var_dump($datos);
    ?>
</body>
</html>