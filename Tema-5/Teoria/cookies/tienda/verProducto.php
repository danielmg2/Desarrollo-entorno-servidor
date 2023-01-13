<?php
    require ('./funciones/funcionesBD.php');
    require './funciones/funcionesCookie.php';
    require('./seguro/conexion.php');
    
    if(!isset($_REQUEST['producto'])){
        header('Location: ./index.php');
    }else{
        $id =$_REQUEST['producto'];
        productoVisto($id);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="producto">
        <h1>Producto</h1>
        <?
            $producto = findById($id);
            $producto = $producto[0];
            echo '<article  class="card">';
            echo '<img src="webroot/'.$producto['alta'].'" alt="pan"></a>';
            echo '<h2>'.$producto['nombre'].'</h2>';
            echo '<p>'.$producto['descripcion'].'</p>';
            echo '</article>';
        ?>
    </section>
    <section class="vistos">
            <h3>Últimos vistos</h3>
    </section>
        <a href="./index.php">Volver</a>
</body>
</html>