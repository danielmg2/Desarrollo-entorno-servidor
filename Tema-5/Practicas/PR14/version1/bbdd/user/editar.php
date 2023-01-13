<?php
require('../funcionesBD.php');
require('../conexionBD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <title>Insertar</title>
</head>
<body>
<header>Modificar</header> 
        
        <div id="modificado">
            <form action="./editar.php?accion=modificar&id=<?php $_REQUEST['id']?>"  method ="post" enctype="multipart/form-data">  
                <label for="id">ID:</label>
                <input type="number" readonly name="id" id="id" value="<?php echo $_GET['id'] ?>">
    
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
    
                <label for="puntuacion">Puntuación:</label>
                <input type="text" name="puntuacion" id="puntuacion">
    
                
                <label for="Fecha">Fecha:</label>
                <input type="text" name="fecha" id="fecha">
    
                <input type="submit" value="Modificar" name="modificar">
            </form>
        </div>
    <?php
    modificado();
    ?>
     <a href="./">Volver</a>
    <footer>
        <a href="../verPag.php?pagina=editar.php">Ver Código</a>
        <a href="../verPag.php?pagina=sql.php">Ver Código CRUD</a>
    </footer>
</body>
</html>
<?php
function modificado(){
    if(isset($_REQUEST['modificar'])){
        actualiza($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['puntuacion'],$_REQUEST['fecha']);
        header('Location: ../leerTabla.php?accion=leer');
        exit();  
    }
    
}

?>