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
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Albaranes</title>
</head>
<body>
<header>
        <img src="../imagenes/logo.png" alt="" width="100" heigth="100">
        <h1>Gestionar Albaranes</h1>
        <div id="recuadro">
                <?php
                    if($_SESSION==null){
                        ?>
                        <a href="./paginas/login.php">Iniciar Sesión</a><br>
                        <a href="./paginas/nuevoUSR.php">Nuevo Usuario</a><br>
                        <?php
                        
                    }else{
                        ?>
                            <a href="./editarUSR.php"><?php echo $_SESSION['user']; ?></a><br>
                        <?php   
                    }  
                ?> 
                    <a href="./logout.php">Cerrar Sesión</a><br>
            </div>
    </header>

   <aside>
       <nav>
           <a href="../index.php">Productos</a>
           <a href="./ventas.php">Ventas</a>
       </nav>
   </aside>
   
        
     
    <main id="mainTablas">
   <?php
    leeAlbaran();
    if($_SESSION['perfil']=="administrador"){
        ?>
        <br>
        <form id="formInsertar"action="../Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">  
            <input type="hidden" name="tabla" value="albaran">
            <label for="editar">Nuevo registro:</label>
            <input type="submit" value="Insertar" name="insertar">
        </form>
        <?php
    }
    ?>
    </main>
     
</body>
</html>