<?php
    require ('./Funciones/funcionesBD.php');
    require ('./seguro/conexionBD.php');
    require ('./ejecutarScript.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>
<body>
    <header>LOGIN</header>
    <?php
    if(compruebaBase()=="camisetas"){
    ?>
    <div id="sesion">
        <!-- Comprobar si la base de datos existe, si no existe se genera la base de datos y se dibuja el login -->
        <form action="./Funciones/valida.php" method="post">
            <br>
            <br>
            <label for="user">Usuario</label>
            <input type="text" name="user" id="usuario">
            <br>
            <br>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="contraseña">
            <br>
            <br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <br>
        <form action="./Funciones/redireccion.php" method="post">
            <input type="submit" value="Crear Usuario" name="nuevoUSR">
        </form>

        <?php
    }else{
        crearBase();
        ?>
        <!-- Comprobar si la base de datos existe, si no existe se genera la base de datos y se dibuja el login -->
        <form action="./Funciones/valida.php" method="post">
            <br>
            <br>
            <label for="user">Usuario</label>
            <input type="text" name="user" id="usuario">
            <br>
            <br>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="contraseña">
            <br>
            <br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <form action="./Funciones/redireccion.php" method="post">
            <input type="submit" value="Crear Usuario" name="nuevoUSR">
        </form>
        <?
    }
    ?>
    </div>

</body>
</html>