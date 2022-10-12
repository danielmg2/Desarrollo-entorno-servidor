<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Página 4</title>
</head>
<body>
    <header>4º Página</header>
    <section>
            <article>
                <p>
                    <ul>
                        <li>
                        Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos 
                        personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años.

                        <!-- El día es: -->
                            <?php
                                //Primeras fechas:
                                $ano=$_GET["ano"];
                                $mes=$_GET["mes"];
                                $dia=$_GET["dia"];

                                //Segundas fechas:
                                $ano2=$_GET["ano2"];
                                $mes2=$_GET["mes2"];
                                $dia2=$_GET["dia2"];


                                $timestamp = strtotime($ano-$mes-$dia);
                                $timestamp2 = strtotime($ano2-$mes2-$dia2);
                                $dif=$timestamp2-$timestamp;
                                $an = $dif / (60*60*24*365);
                                
                                echo "<br>";
                                echo $an;
                            ?>
                        </li>
                    </ul>
                    
                </p>
            </article>
    </section>
    <a href="../index.html">Volver al Índice</a>
    <footer><a href="verPag4.php">Ver codigo de la página</a></footer>
</body>
</html>