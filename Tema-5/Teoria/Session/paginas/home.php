<?php
    session_start();
    require ('../funciones/funciones.php');

    if(!estaValidado()){
        header('Location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
<header>
        <h2><?php echo  $_SESSION['nombre']?></h2>
        <a href="../logout.php">Log out</a>
    </header>
    <?php
    if(esModerador()){
        echo "<h1>Es Moderador</h1>";
    }else{
        echo "<h1>Es Usuario</h1>";
    }
    ?>
</body>
</html>