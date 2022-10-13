<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Página 2</title>
</head>
<body>
    <header>3º Página </header>
    <ul>
        <li>
        Crea una página a la que se le pase por url una variable con el nombre que quieras y 
        muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float:
        <?php
            $variable= $_GET["variable"];
            echo "<br/>";
            echo "El valor de la variable es:";
            var_dump($variable);
            echo "<br/>";
            echo "La variable es de tipo ".gettype($variable);
            if(is_numeric($variable))
            {
                echo "<br/>";
                echo "Es numérico";
                echo "<br/>";      
            } 
        ?>
        </li>
    </ul>
    
    </br>
    <a href="../index.html">Volver al Índice</a>
    <footer><a href="verPag2.php">Ver código de la página</a></footer>
</body>
</html>