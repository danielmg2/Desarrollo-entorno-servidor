<?php
session_start();
require ('./Funciones/funcionesBD.php');
require ('./seguro/conexionBD.php');    
require ('./ejecutarScript.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Inicio</title>
</head>
<body>
    <header>
        <?php
        if(compruebaBase()=="camisetas"){
            ?>
            <img src="./imagenes/logo.png" alt="" width="100" heigth="100">
            <h1>Camisetas Deportivas</h1>
            <div id="recuadro">
                <?php
                    if($_SESSION==null){
                        ?>
                        <a href="./paginas/login.php">Iniciar Sesión</a><br>
                        <a href="./paginas/nuevoUSR.php">Nuevo Usuario</a><br>
                        <?php             
                    }else{
                        ?>
                            <a href="./paginas/editarUSR.php"><?php echo $_SESSION['user']; ?></a><br>
                        <?php          
                    }      
                ?>
                    <a href="./paginas/logout.php">Cerrar Sesión</a> <br>    
            </div>
    </header>
    
    <aside>

            <?php
                if($_SESSION!=null){
                if(($_SESSION['perfil']=="administrador")||($_SESSION['perfil']=='moderador')){
                ?>
                <nav>
                    
                    <a href="./paginas/ventas.php">Ventas</a>
                    <a href="./paginas/albaranes.php">Albaranes</a>      

                </nav>
                    <div id="nav">
                    </div>   
                <?php
                } 
                }
                ?>
    </aside>
    
    <main>
                <!-- Consulta de la tabla de productos -->
                <!-- Mostrar la tabla -->
                <!-- dependidendo del usuario que inicie sesion se mostrara una cosa u otra -->
                <br>
                <?php
                leeProductos();
                
                if($_SESSION!=null){
                    if($_SESSION['perfil']=="administrador"){
                        ?>
                        
                        <form id="formInsertar"action="./Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">  
                            <br>
                            <p>

                                <input type="hidden" name="tabla" value="productos">
                                <label for="editar">Nuevo registro:</label>
                                <input type="submit" value="Insertar" name="insertar">
                            </p>
                        </form>
                        <?php
                    }
                }
                ?>
            <?php
        }else{
            crearBase();
            
            header("Refresh:0.1");
            exit();
        }
        ?>
    </main>
    
    
</body>
</html>