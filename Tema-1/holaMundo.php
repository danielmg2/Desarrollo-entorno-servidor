<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pruebas de php con html</h1>
    <?
    echo "Hola Mundo";
    print("<p>Hola clase</p>");
    ?>

    <p><?echo "Una Linea"?></p>
    
    
    <h1>Tipos de datos</h1>
    <?var_dump("maria");
    var_dump(3);
    var_dump(3.17);?>

    <h1>Tipos de datos</h1>
        <?
            $mivariable = 3;
            var_dump($mivariable);
            $mivariable= "maria";
            var_dump($mivariable);

            $mifloat = 3.17;
            echo "<br>";
            var_dump($mifloat);
            $nuevoint = (int)$mifloat;
            var_dump($nuevoint);
            echo "<br>";
            $booleano=true;
            var_dump($booleano);
            echo "<br>";
            $vacia = null;
            $esnula = is_null($vacia);
            var_dump($esnula);
        ?>
    <h1>GET</h1>
        <?php
            var_dump($_GET);
        ?>
    <h1>Tipo de dato</h1>
    <h1>awdadw</h1>
        <?php
            echo "La variable mivariable es de tipo y uso ".gettype($mivariable);
            echo "La variable de la irl hijos es ". $_GET["hijos"];
            // echo "<br>";
            echo is_numeric($_GET["hijos"]);
        ?>
    <h2>variable de variable</h2>
    <?php
        $viernes = "fiesta";
        $$viernes = "copas";
        echo $viernes;
        echo "<br>";
        echo $$viernes;
        echo "<br>";
        echo $fiesta;
    ?>

</body>
</html>