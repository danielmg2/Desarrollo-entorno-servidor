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
    <link rel="stylesheet" href="../css/login.css">
    <title>Edicion de tablas</title>
</head>
<body>
<header>
        <img src="../imagenes/logo.png" alt="" width="100" heigth="100">
        <h1>Gestión de tablas</h1>
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
    <?php 
    $idProd=maxIdProducto();
    $idProdMin=minIdProducto();
        if($_REQUEST['accion']=='modificar'){
            if($_REQUEST['tabla']=='productos'){
            ?>
                <div class="login">
                
                    <form class="login-form" action="../paginas/editar.php" method="post">
                        <h3>Modificación de Producto</h3>
                        <p>

                            <label for="id">Id de producto:</label>
                            <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">
                        </p>

                        <p>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <?php if((modificado())&&(vacio("nombre"))){
                            echo "<span>NOMBRE VACIO</span>";
                        }?>
                        </p>

                        <p>
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion">
                        <?php if((modificado())&&(vacio("descripcion"))){
                            echo "<span>DESCRIPCION VACIA</span>";
                        }?>
                        </p>
                        
                       <p>
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio">
                        <?php if((modificado())&&(vacio("precio"))){
                            echo "<span>PRECIO VACIO O INCORRECTO debe de llevar 2 decimales</span>";
                        }
                        ?>
                       </p>

                        <p>
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" id="stock">
                        <?php if((modificado())&&(vacio("stock"))){
                            echo "<span>STOCK VACIO</span>";
                        }
                        ?>
                        </p>
                        <p>
                        <label for="imagen">Imagen:</label>
                        <input type="text" name="imagen" id="imagen">
                        <?php if((modificado())&&(vacio("imagen"))){
                            echo "<span>IMAGEN VACIA (img.jpg)</span>";
                        }
                        ?>
                        </p>                      
                        <input type="hidden" name="claveProd" value="<?php echo $_REQUEST['claveProd'] ?>">
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" class="login-button" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
           //Modificación de productos
            if(validaModProducto()){
                 modProducto($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['stock'],$_REQUEST['imagen']);
                 header('Location: ../index.php');
                 exit(); 
            }
        }

        if($_REQUEST['tabla']=='ventas'){
            
            ?>
                <div class="login">
                    <form class="login-form" action="../paginas/editar.php" method="post">
                        <p>
                            <label for="id">Id de ventas:</label>
                            <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">
                        </p>

                        <p>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <?php if((modificado())&&(vacio("usuario"))){
                            echo "<span>USUARIO VACIO</span>";
                        }?>
                        </p>

                        <p>
                        <label for="fecha">Fecha de compra:</label>
                        <input type="date" name="fecha" id="fecha">
                        <?php if((modificado())&&(vacio("fecha"))){
                            echo "<span>FECHA VACIA</span>";
                        }?>
                        </p>

                        <p>
                            <label for="idp">Id de producto:</label>
                            <input type="number" name="idp" id="idp" min="<?php echo $idProdMin ?>" max="<?php echo $idProd ?>" value="<?php echo $_REQUEST["claveProd"]?>">
                        </p>

                        <p>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <?php if((modificado())&&(vacio("cantidad"))){
                            echo "<span>CANTIDAD VACIA</span>";
                        }?>
                        </p>

                        <p>
                        <label for="precio">Precio total:</label>
                        <input type="text" name="precio" id="precio" value="">
                        <?php if((modificado())&&(vacio("precio"))){
                            echo "<span>PRECIO VACIO O INCORRECTO DEBE DE LLEVAR 2 DECIMALES</span>";
                        }
                        ?>
                        </p>
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="claveProd" value="<?php echo $_REQUEST['claveProd'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" class="login-button" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
        
            if( validaModVenta()){
                modVenta($_REQUEST['id'], $_REQUEST['usuario'],$_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['precio']);   
                header('Location: ./ventas.php');
                exit();
            }
        }
        if($_REQUEST['tabla']=='albaran'){
            
            ?>
                <div class="login">
                    <form class="login-form" action="../paginas/editar.php" method="post">
                        <h3>Modificación de albarán</h3>
                        <p>
                            <label for="id">Id de albaran:</label>
                            <input type="text" readonly name="id" id="id" value="<?php echo $_REQUEST['clave']?>">

                        </p>
                        
                        <p>
                        <label for="fecha">Fecha de albaran:</label>
                        <input type="date" name="fecha" id="fecha">
                        <?php if((modificado())&&(vacio("fecha"))){
                            echo "<span>FECHA VACIA</span>";
                        }?>
                        </p>
                        
                        <p>
                            <label for="idp">Id de producto:</label>
                            <input type="number" name="idp" id="idp" min="<?php echo $idProdMin ?>" max="<?php echo $idProd ?>" value="<?php echo $_REQUEST["claveProd"]?>">
                        </p>

                        <p>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <?php if((modificado())&&(vacio("cantidad"))){
                            echo "<span>CANTIDAD VACIA</span>";
                        }?>
                        </p>
                        
                        <p>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <?php if((modificado())&&(vacio("usuario"))){
                            echo "<span>USUARIO VACIO</span>";
                        }?>
                        </p>
                        
                        <input type="hidden" name="claveProd" value="<?php echo $_REQUEST['claveProd'] ?>">
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="clave" value="<?php echo $_REQUEST['clave'] ?>">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="submit" class="login-button" value="Confirmar Edición" name="modificar">
                    </form>
                </div>
            <?php
            
            if( validaModAlbaran()){
                modAlbaran($_REQUEST['id'],$_REQUEST['usuario'],$_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad']);
                header('Location: ./albaranes.php');
                exit(); 
            }
        }       
    }else if($_REQUEST['accion']=='insertar'){
       
        if($_REQUEST['tabla']=='productos'){
            // $clave=$_REQUEST['clave'];
            
            ?>
                <div class="login">
                    <form class="login-form" action="../paginas/editar.php" method="post">
                        <h3>Nuevo Producto</h3>
                        <p>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <?php if((insertado())&&(vacio("nombre"))){
                            echo "<span>NOMBRE VACIO</span>";
                        }?>
                        </p>

                        <p>
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion">
                        <?php if((insertado())&&(vacio("descripcion"))){
                            echo "<span>DESCRIPCION VACIA</span>";
                        }?>
                        </p>
                        
                        <p>
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio">
                        <?php if((insertado())&&(vacio("precio"))){
                            echo "<span>PRECIO VACIO O INCORRECTO debe de llevar 2 decimales</span>";
                        }
                        ?>
                        </p>

                        <p>
                        <label for="precio">Stock:</label>
                        <input type="number" name="stock" id="stock">
                        <?php if((insertado())&&(vacio("stock"))){
                            echo "<span>STOCK VACIO</span>";
                        }
                        ?>
                        </p>
                        <p>
                        <label for="imagen">Imagen:</label>
                        <input type="text" name="imagen" id="imagen">
                        <?php if((insertado())&&(vacio("imagen"))){
                            echo "<span>IMAGEN VACIA (img.jpg)</span>";
                        }
                        ?>
                        </p>    
 
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="accion" value="insertar">
                        <input type="submit" class="login-button" value="Confirmar" name="insertar">
                    </form>
                </div>
            <?php
            
            if(validaInsProducto()){
                nuevoProducto($_REQUEST['nombre'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['stock'],$_REQUEST['imagen']);
                header('Location: ../index.php');
                exit(); 
           }
        }

        if($_REQUEST['tabla']=='ventas'){
            
            ?>
                <div class="login">
                    <form class="login-form" action="../paginas/editar.php" method="post">

                        <p>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <?php if((insertado())&&(vacio("usuario"))){
                            echo "<span>USUARIO VACIO</span>";
                        }?>
                        </p>

                        <p>                        
                        <label for="fecha">Fecha de compra:</label>
                        <input type="date" name="fecha" id="fecha">
                        <?php if((insertado())&&(vacio("fecha"))){
                            echo "<span>FECHA VACIA</span>";
                        }?>
                        </p>
                        
                        <p> 
                            <label for="idp">Id de producto:</label>
                            <input type="number" name="idp" id="idp" min="<?php echo $idProdMin ?>" max="<?php echo $idProd ?>" value="">
                        </p>

                        <p>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <?php if((insertado())&&(vacio("cantidad"))){
                            echo "<span>CANTIDAD VACIA</span>";
                        }?>
                        </p>
                        
                        <p>
                        <label for="precio">Precio del producto:</label>
                        <input type="text" name="precio" id="precio" value="">
                        <?php if((insertado())&&(vacio("precio"))){
                            echo "<span>PRECIO VACIO O INCORRECTO DEBE DE LLEVAR 2 DECIMALES</span>";
                        }
                        ?>
                        </p>

                        
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="accion" value="insertar">
                        <input type="submit" class="login-button" value="Confirmar" name="insertar">
                    </form>
                </div>
            <?php
            if(validaInsVenta()){
                nuevoVenta($_REQUEST['usuario'],$_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['precio']); 
                header('Location: ./ventas.php');
                exit();
            }
        }
        if($_REQUEST['tabla']=='albaran'){
            
            ?>
                <div class="login">
                    <form class="login-form" action="../paginas/editar.php" method="post">
                       <p>
                        <label for="fecha">Fecha de albaran:</label>
                        <input type="date" name="fecha" id="fecha">
                        <?php if((insertado())&&(vacio("fecha"))){
                            echo "<span>FECHA VACIA</span>";
                        }?>
                       </p>

                        <p>
                            <label for="idp">Id de producto:</label>
                            <input type="number" name="idp" id="idp" min="<?php echo $idProdMin ?>"  max="<?php echo $idProd ?>" value="">
                        </p>

                       <p>
                        <label for="cantidad">Cantidad de productos:</label>
                        <input type="number" name="cantidad" id="cantidad" value="">
                        <?php if((insertado())&&(vacio("cantidad"))){
                            echo "<span>CANTIDAD VACIA</span>";
                        }?>
                       </p>

                        <p>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario">
                        <?php if((insertado())&&(vacio("usuario"))){
                            echo "<span>USUARIO VACIO</span>";
                        }?>
                        </p> 
                                              
                        <input type="hidden" name="tabla" value="<?php echo $_REQUEST['tabla'] ?>">
                        <input type="hidden" name="accion" value="insertar">
                        <input type="submit" class="login-button" value="Confirmar" name="insertar">
                    </form>
                </div>
            <?php

            if(validaInsAlbaran()){
                nuevoAlbaran($_REQUEST['fecha'],$_REQUEST['idp'],$_REQUEST['cantidad'],$_REQUEST['usuario']);
                header('Location: ./albaranes.php');
                exit(); 
            }
        }  

    }
    ?>
    
</body>
</html>
