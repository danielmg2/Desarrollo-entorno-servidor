<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    $es="Hola Mundo";
    $en="Hello world";

    $idioma=$_GET['pais'];
    //var_dump($idioma);
    echo $$idioma;
?>
    
</body>
</html>