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

    <h1>
        <?
            $mivariable = 3;
            var_dump($mivariable);
            $mivariable= "maria";
            var_dump($mivariable);

            $mifloat = 3.17;
            echo "<br>";
            var_dump($mifloat);
            $nuevoint = (int)$mifloat;
            var_dump($nuevoint)
        ?>
    </h1>
</body>
</html>