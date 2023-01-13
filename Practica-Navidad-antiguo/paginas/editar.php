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
    <title>Edicion de tablas</title>
</head>
<body>
<header>
        <img src="../imagenes/logo.png" alt="" width="100" heigth="100">
        <h1>Edición de tablas</h1>
        <div id="recuadro">
            <?php
                echo $_SESSION['perfil'];
            ?>
            <a href="./editarUSR.php">Editar Perfil</a>
            Cerrar sesion
        </div>
    </header>
    <?php 
        if($_REQUEST['accion']=='modificar'){
            if($_REQUEST['tabla']=='productos'){
            ?>
                <div id="nuevaSesion">
                    <form action="../paginas/editar.php" method="post">
                        <label for="id">Id de producto:</label>
                        <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">
                        <br>
                        <br>
                        <label for="descripcion">Nombre:</label>
                        <input type="text" name="descripcion" id="descripcion">
                        <br>
                        <br>
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio">
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
            if(isset($_REQUEST['modificar'])){
                modProducto($_REQUEST['id'],$_REQUEST['descripcion'],$_REQUEST['precio']);
            }
        }

        if($_REQUEST['tabla']=='ventas'){
            ?>
                <div id="nuevaSesion">
                    <form action="../paginas/editar.php" method="post">
                        <label for="id">Id de ventas:</label>
                        <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">
                        <br>
                        <br>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <br>
                        <br>
                        <label for="fecha">Fecha de compra:</label>
                        <input type="date" name="fecha" id="fecha">
                        <br>
                        <br>
                        <label for="idp">Id de producto:</label>
                        <input type="text" name="idp" id="idp" value="">
                        <br>
                        <br>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <br>
                        <br>
                        <label for="precio">Precio total:</label>
                        <input type="text" name="precio" id="precio" value="">
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
            if(isset($_REQUEST['modificar'])){
                modVenta($_REQUEST['id'], $_REQUEST['usuario'],$_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['precio']);
            }
        }
        if($_REQUEST['tabla']=='albaran'){
            ?>
                <div id="nuevaSesion">
                    <form action="../paginas/editar.php" method="post">
                        <label for="id">Id de albaran:</label>
                        <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">
                        <br>
                        <br>
                        <label for="fecha">Fecha de albaran:</label>
                        <input type="date" name="fecha" id="fecha">
                        <br>
                        <br>
                        <label for="idp">Id de producto:</label>
                        <input type="text" name="idp" id="idp" value="">
                        <br>
                        <br>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <br>
                        <br>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
            if(isset($_REQUEST['modificar'])){
                modAlbaran($_REQUEST['id'],$_REQUEST['usuario'],$_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad']);
            }
        }       
    }else if($_REQUEST['accion']=='insertar'){
       
        if($_REQUEST['tabla']=='productos'){
            $clave=$_REQUEST['clave'];
            ?>
                <div id="nuevaSesion">
                    <h3>Nuevo Producto</h3>
                    <form action="../paginas/editar.php" method="post">
                        
                        <label for="descripcion">Nombre:</label>
                        <input type="text" name="descripcion" id="descripcion">
                        <br>
                        <br>
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio">
                        <br>
                        <br>
                        <label for="precio">Stock:</label>
                        <input type="number" name="stock" id="stock">
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="insertar">
                        <input type="submit" value="Confirmar" name="insertar">
                    </form>
                </div>
            <?php
            if(isset($_REQUEST['insertar'])){
                nuevoProducto($_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['stock']);
            }
        }

        if($_REQUEST['tabla']=='ventas'){
            ?>
                <div id="nuevaSesion">
                    <form action="../paginas/editar.php" method="post">
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <br>
                        <br>
                        <label for="fecha">Fecha de compra:</label>
                        <input type="date" name="fecha" id="fecha">
                        <br>
                        <br>
                        <label for="idp">Id de producto:</label>
                        <input type="text" name="idp" id="idp" value="">
                        <br>
                        <br>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <br>
                        <br>
                        <label for="precio">Precio total:</label>
                        <input type="text" name="precio" id="precio" value="">
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="insertar">
                        <input type="submit" value="Confirmar" name="insertar">
                    </form>
                </div>
            <?php
            if(isset($_REQUEST['insertar'])){
                nuevoVenta($_REQUEST['usuario'],$_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['precio']);
            }
        }
        if($_REQUEST['tabla']=='albaran'){
            ?>
                <div id="nuevaSesion">
                    <form action="../paginas/editar.php" method="post">
                       
                        <label for="fecha">Fecha de albaran:</label>
                        <input type="date" name="fecha" id="fecha">
                        <br>
                        <br>
                        <label for="idp">Id de producto:</label>
                        <input type="text" name="idp" id="idp" value="">
                        <br>
                        <br>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <br>
                        <br>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="insertar">
                        <input type="submit" value="Confirmar" name="insertar">
                    </form>
                </div>
            <?php
            if(isset($_REQUEST['insertar'])){
                nuevoAlbaran($_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['usuario']);
            }
        }  

    }
    ?>
    
</body>
</html>