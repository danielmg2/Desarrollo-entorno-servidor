<?php
    require('./funcionesBD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Leer Tabla</title>
</head>
<body>
    <header>Gestion de base de datos</header>   
    <?php
    if($_GET['accion']=="leer"){
        primeraConsulta();

    }else if($_GET['accion']=="borrar"){
        borra($_GET['valor']);
        primeraConsulta();
    }else if($_GET['accion']=="buscar"){
        consulta($_GET['valor']);   
    }
    ?>
    <form id="formInsertar"action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
        <label for="editar">Insertar nuevo registro:</label>
        <input type="submit" value="Insertar" name="editar">
    </form>



    <a href="./">Volver</a>
    <footer>
        <a href="./verPag.php?pagina=leerTabla.php">Ver Código</a>
        <a href="./verPag.php?pagina=sql.php">Ver Código CRUD</a>
    </footer>
</body>
</html>