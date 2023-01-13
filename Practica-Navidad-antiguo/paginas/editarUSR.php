<?php
    session_start();
    require ('../Funciones/funcionesBD.php');
    require ('../seguro/conexionBD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Editar Usuario</title>
</head>
<body>

    <header>CREACION DE NUEVO USUARIO</header>
    <div id="nuevaSesion">
        <form action="./editarUSR.php" method="post">
            <label for="nombre">Nombre de usuario:</label>
            <input type="text" readonly name="nombre" id="nombre" value="<?php echo $_SESSION['user']?>">
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
            <input type="date" name="fecha" id="fecha" value="">
            <br>
            <br>
            <input type="submit" value="Editar Usuario" name="eUsuario">
        </form>
    </div>
        <?php
        if(isset($_REQUEST['eUsuario'])){
             if($_REQUEST['contrasena']==$_REQUEST['confirmacionC']){

                 modUser($_SESSION['user'],$_REQUEST['contrasena'],$_REQUEST['email'],$_REQUEST['fecha']);
             }
        }
    
    ?>
</body>
</html>