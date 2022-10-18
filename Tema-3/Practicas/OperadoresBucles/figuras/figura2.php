<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2º Figura</title>
</head>
<body>
    <?php
        $filas= $_GET['filas'];
        $asterisco=1;
        $espacio=$filas*2;
        for($i=0; $i<$filas;$i++)
        {
            //espacios
            for($f=0;$f<=$espacio;$f++)
            {
                echo("&nbsp;");
            }
            //Asteriscos izquierda
            for($g=0;$g<$asterisco;$g++)
            {
                echo("*");
            }
            
            $asterisco+=2;
            $espacio-=2;
            echo "<br>";
        }
            
            $asterisco-=2;
            $espacio+=2;
            
        
            for($i=0; $i<$filas;$i++)
        {
            $asterisco-=2;
            $espacio+=2;
            for($f=0;$f<=$espacio;$f++)
            {
                echo("&nbsp;");
            }
            //Asteriscos izquierda
            for($g=0;$g<$asterisco;$g++)
            {
                echo("*");
               
            }
            echo "<br>";
        }

    
    ?>
</body>
</html>