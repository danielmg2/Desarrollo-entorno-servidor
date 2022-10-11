<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página 3</title>
</head>
<body>
    <?php
       
        //$d=$_GET['fecha'];
        $fecha=new DateTime($_GET['fecha'], time("d,m,y"));
        echo $d;
        //echo $fecha;
    ?>
    <br/>
     <a href="verPag3.php">Ver codigo de la página</a>
</body>
</html>