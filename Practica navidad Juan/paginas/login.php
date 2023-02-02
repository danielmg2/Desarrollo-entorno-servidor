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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
   <header class="bg-dark" >
        <div class="container-fluid">
        <div class="row " >
            <div class="col-3  ">
                <img src="../imagenes/logo.png" alt="" width="100" heigth="100">

            </div>
            <div class="col-6  text-center">
                <h1 class="text-light">Gestión de tablas</h1>

            </div>
        </div>
            
            
        </div>
   </header>


    
    <div class="login">
        <div class="login-header">
            
            </div>
            <!-- Comprobar si la base de datos existe, si no existe se genera la base de datos y se dibuja el login -->
            <form  class="login-form" action="../Funciones/valida.php" method="post">
            <div>
                <h2>Login</h2>
            </div>
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