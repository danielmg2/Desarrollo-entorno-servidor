<?php
    require('./funcionesBD.php');
    require('./conexionBD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Insertar/modificar</title>
</head>
<body>
     
    <?php
    if($_GET['accion']=="insertar"){
        $idMaxima=buscaID();
        ?>
            <header>Insertar</header> 
            <div id="insertado">

                <form action="./editar.php?accion=insertar"  method ="post" enctype="multipart/form-data">  
                    <label for="id">ID:</label>
                    <input type="number" readonly name="id" id="id" value="<?php echo ($idMaxima+1) ?>">
    
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
    
                    <label for="puntuacion">Puntuación:</label>
                    <input type="text" name="puntuacion" id="puntuacion">
    
                    
                    <label for="Fecha">Fecha:</label>
                    <input type="text" name="fecha" id="fecha">
    
                    <input type="submit" value="Insertar" name="insertar">
                </form>
            </div>
        <?php
            enviado();
    }
    ?>
     <a href="./">Volver</a>
    <footer>
        <a href="./verPag.php?pagina=editar.php">Ver Código</a>
        <a href="./verPag.php?pagina=sql.php">Ver Código CRUD</a>
    </footer>
</body>
</html>


<?php

function enviado(){
    if(isset($_REQUEST['insertar'])){
        //Validacion de puntuacion y fecha
        if(preg_match('/^\d[.]\d\d$/',$_REQUEST['puntuacion'])){
            if(preg_match('/^[1-2][0]\d\d-((11)?(12)?(10)?(0)?[1-9]?)-((31)?(30)?([0-2][0-9])?)$/',$_REQUEST['fecha'])){
                inserta($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['puntuacion'],$_REQUEST['fecha']);
                header('Location: ./leerTabla.php?accion=leer');
                exit();  

            }else{
                ?>
                    <div id ="error"> Error al insertar los valores, la puntuacion debe de tener 2 decimales y la fecha debe de ser AÑO-MES-DIA</div>

                <?php
            }

        }else{
            ?>
                <div id ="error"> Error al insertar los valores, la puntuacion debe de tener 2 decimales y la fecha debe de ser AÑO-MES-DIA</div>

            <?php
        }


    }
    
}
?>