<?php
    session_start();
    require ('../Funciones/validaForm.php');
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
    $idProd=maxIdProducto();
        if($_REQUEST['accion']=='modificar'){
            if($_REQUEST['tabla']=='productos'){
            ?>
                <div id="nuevaSesion">
                    <form action="../paginas/editar.php" method="post">
                        <label for="id">Id de producto:</label>
                        <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">
                        <br>
                        <br>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <?php if((modificado())&&(vacio("nombre"))){
                            echo "<span>NOMBRE VACIO</span>";
                        }?>
                        <br>
                        <br>
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion">
                        <?php if((modificado())&&(vacio("descripcion"))){
                            echo "<span>DESCRIPCION VACIA</span>";
                        }?>
                        <br>
                        <br>
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio">
                        <?php if((modificado())&&(vacio("precio"))){
                            echo "<span>PRECIO VACIO O INCORRECTO debe de llevar 2 decimales</span>";
                        }
                        ?>

                        <br>
                        <br>
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" id="stock">
                        <?php if((modificado())&&(vacio("stock"))){
                            echo "<span>STOCK VACIO</span>";
                        }
                        ?>
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
           //Modificación de productos
            if(validaModProducto()){
                 modProducto($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['stock']);
                echo "CORRECTO";
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
                        <?php if((modificado())&&(vacio("usuario"))){
                            echo "<span>USUARIO VACIO</span>";
                        }?>
                        <br>
                        <br>
                        <label for="fecha">Fecha de compra:</label>
                        <input type="date" name="fecha" id="fecha">
                        <?php if((modificado())&&(vacio("fecha"))){
                            echo "<span>FECHA VACIA</span>";
                        }?>
                        <br>
                        <br>
                        <label for="idp">Id de producto:</label>
                        <input type="number" name="idp" id="idp" min="1" max="<?php echo $idProd ?>" value="<?php echo $_REQUEST["claveProd"]?>">
                        <br>
                        <br>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <?php if((modificado())&&(vacio("cantidad"))){
                            echo "<span>FECHA VACIA</span>";
                        }?>
                        <br>
                        <br>
                        <label for="precio">Precio total:</label>
                        <input type="text" name="precio" id="precio" value="">
                        <?php if((modificado())&&(vacio("precio"))){
                            echo "<span>PRECIO VACIO O INCORRECTO DEBE DE LLEVAR 2 DECIMALES</span>";
                        }
                        ?>
                        <br>
                        <br>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="claveProd" value="<?php echo $_REQUEST['claveProd'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
        
            if( validaModVenta()){
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
                        <input type="number" name="idp" id="idp" min="1" max="<?php echo $idProd ?>" value="<?php echo $_REQUEST["claveProd"]?>">
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
                        <input type="hidden" name="claveProd" value="<?php echo $_REQUEST['claveProd'] ?>">
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
            
            if( validaModAlbaran()){
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
                        
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <br>
                        <br>
                        <label for="descripcion">Descripción:</label>
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
            
            if(validaInsProducto()){
                nuevoProducto($_REQUEST['nombre'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['stock']);
               echo "CORRECTO";
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
                        <input type="number" name="idp" id="idp" min="1" max="<?php echo $idProd ?>" value="">
                        <br>
                        <br>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <br>
                        <br>
                        <label for="precio">Precio del producto:</label>
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
            if(validaInsVenta()){
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
                        <input type="number" name="idp" id="idp" min="1"  max="<?php echo $idProd ?>" value="">
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

            if(validaInsAlbaran()){
                nuevoAlbaran($_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['usuario']);
            }
        }  

    }
    ?>
    
</body>
</html>