<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página 2</title>
</head>
<body>
    <?php
    $variable= $_GET["variable"];
    echo "El valor de la variable es:";
    var_dump($variable);
    echo "<br/>";
    echo "La variable es de tipo ".gettype($variable);
    if(is_numeric($variable))
    {
        echo "<br/>";
        echo "Es numérico";
        echo "<br/>";
        if(is_int($variable))
        {
            echo "Es Entero";
        }else if(is_flaot($variable))
        {
            echo "Es Float";
        }
        
    } 
    ?>
    <a href="verPag2.php">Ver codigo de la página</a>
</body>
</html>