<?php
    require ('../Funciones/funcionesBD.php');
    require ('../seguro/conexionBD.php');
    require ('../ejecutarScript.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
   


    
    <div class="login">
        <div class="login-header">
            <h1>Login</h1>
        </div>
        <!-- Comprobar si la base de datos existe, si no existe se genera la base de datos y se dibuja el login -->
        <form  class="login-form" action="../Funciones/valida.php" method="post">
            <p>
                <label for="user">Usuario</label>
                <input type="text" name="user" id="usuario" placeholder="Usuario">
            </p>
            
            <p>

                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="contraseña" placeholder="Contraseña">
            </p>
            <p>
                <input class="login-button" type="submit" value="Crear Usuario" name="nuevoUSR">
                <input class="login-button" type="submit" value="Iniciar Sesión">
            </p>
        <?php
        if(isset($_SESSION['error'])){
            ?>
            <span><?php echo $_SESSION['error']; ?></span>
            <?php
           
        }
        unset($_SESSION['error']);
    ?>
        </form>
        
        <!-- <form action="../Funciones/redireccion.php" method="post">
        </form> -->
</body>
</html>