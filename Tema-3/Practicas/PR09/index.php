<?php
    require("./validaForm.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>PR09</title>
</head>
<header>PR09: Formulario y expresiones regulares</header>
<body>

    
    <div>
        <form action=" ./index.php" method ="post" enctype="multipart/form-data">
        <br>    
            <label for="nombre">Nombre</label>
            <input type="text" id="idnombre" name="nombre" value ="<?php
                if(enviado() && !vacio("nombre")){
                    echo $_REQUEST["nombre"];
                }
            ?>">

            <?php
                if(enviado() &&(validarUsuario($_REQUEST['nombre'])==0)){
                ?>
                    <span>Usuario incorrecto</span>
                <?php
                }
            ?>
            <br>
            <br>
            
            <label for="apellidos">Apellidos</label>
            <input type="text" id="idapellidos" name="apellidos" value ="<?php
                if(enviado() && !vacio("apellidos")){
                    echo $_REQUEST["apellidos"];
                }
            ?>">

            <?php
                if(enviado() &&(validarApellidos($_REQUEST['apellidos'])==0)){
                ?>
                    <span>Apellido incorrecto</span>
                <?php
                }
            ?>
            <br>
            <br>
            
            <label for="fecha">Fecha</label>
            <input type="text" id="idfecha" name="fecha" value ="<?php
                if(enviado() && !vacio("fecha")){
                    echo $_REQUEST["fecha"];
                }
            ?>">

            <?php
                if(enviado() &&(validarFecha($_REQUEST['fecha'])==0)){
                ?>
                    <span>fecha incorrecta</span>
                <?php
                }
            ?>
            <br>
            <br>
            <label for="dni">DNI</label>
            <input type="text" id="iddni" name="dni">
            <br>
            <br>
            
            <label for="email">Correo Electronico</label>
            <input type="text" id="idemail" name="email" value ="<?php
                if(enviado() && !vacio("email")){
                    echo $_REQUEST["email"];
                }
            ?>">
            
            
            <?php
                if(enviado() &&(validarCorreo($_REQUEST['email'])==0)){
                ?>
                    <span>email incorrecto</span>
                <?php
                }
            ?>
            
            <br>
            <br> 
            <input type="file" name="fich" id="idfich" value="<?php
                if(enviado()){
                    echo $_FILES["fich"]['name'];
                }
            ?>">
            <?php             
                if(enviado() && (!validarFichero(basename($_FILES['fich']['name'])))){
                ?>
                    <span>Extension de fichero incorrecta</span>
                <?php
                }else if(enviado() && (validarFichero(basename($_FILES['fich']['name'])))){
                    $ubi="/var/www/html/Desarrollo-entorno-servidor/Tema-3/Practicas/PR09/imagenes/".basename($_FILES['fich']['name']);
                    
                   ?>
                    <br> 
                    <img src=<?php $ubi ?> width="50" height="70">
                    <?php
                }
            ?>
            
            
            <input type="submit" value= "Enviar" name ="enviado">
        </form>
    </div>
</body>
<footer>
    <a href="./verPag.php">Ver Código index</a>
    <br> 
    <a href="./verPagValida.php">Ver Código de validación</a>     
</footer>
</html>