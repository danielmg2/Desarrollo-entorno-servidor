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
    <title>Ventas</title>
</head>
<body>
<header>
        <img src="../imagenes/logo.png" alt="" width="100" heigth="100">
        <h1>Gestionar Ventas</h1>
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
                    
                    <a href="./logout.php">Cerrar Sesión</a>
            </div>
    </header>
    <aside>
        <nav>
            <a href="../index.php">Productos</a>
            <a href="./albaranes.php">Albaranes</a>
            
        </nav>
    </aside>
    <main id="mainTablas">

    <?php
    leeVentas();
   
    if($_SESSION['perfil']=="administrador"){
        ?>
        <br>
        <form id="formInsertar"action="../Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">  
            <input type="hidden" name="tabla" value="ventas">
            <label for="editar">Nuevo registro:</label>
            <input type="submit" value="Insertar" name="insertar">
        </form>
        <?php
    }
    ?>
    </main>
    <!-- <a href="../"><img src="../imagenes/icons8-flecha-izquierda-larga-50.png" alt=""></a> -->
     
</body>
</html>