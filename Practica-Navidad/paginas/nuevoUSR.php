<?php
    session_start();
    require ('../Funciones/funcionesBD.php');
    require ('../seguro/conexionBD.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Nuevo Usuario</title>
</head>
<body>
    <header>CREACION DE NUEVO USUARIO</header>
    <div id="nuevaSesion">
        <form action="./nuevoUSR.php" method="post">
            <label for="nombre">Nombre de usuario:</label>
            <input type="text" name="nombre" id="nombre">
            <br>
            <br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena">
            <br>
            <br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="confirmacionC" id="confirmacionC">
            <br>
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <br>
            <br>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">
            <br>
            <br>
            <input type="submit" value="Crear Usuario" name="nUsuario">
        </form>
    </div>
    <?php
        if(isset($_REQUEST['nUsuario'])){
             if($_REQUEST['contrasena']==$_REQUEST['confirmacionC']){

                 nuevoUser($_REQUEST['nombre'],$_REQUEST['contrasena'],$_REQUEST['email'],$_REQUEST['fecha']);
             }
        }
    
    ?>
</body>
</html>