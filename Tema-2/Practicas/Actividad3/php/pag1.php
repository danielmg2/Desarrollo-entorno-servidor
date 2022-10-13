<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>1º Página </title>
</head>
<body>
    <header>1º Página</header>
    <section>
        <article>
            <p>
                <ul>
                    <li>
                        1º Muestra el nombre del fichero que se está ejecutando:
                        <br>
                        <?php
                            echo (__FILE__);
                        ?>
                    </li>
                </ul>
                
            </p>
            
        </article>
        <article>
            <p>
                <ul>
                    <li>
                        2º Muestra la dirección IP del equipo desde el que estás accediendo:
                        <?php
                            echo "<br>";
                            echo $_SERVER['REMOTE_ADDR'];
                        ?>
                    </li>
                </ul>
            
            </p>    
        </article>

        <article>
            <p>
                <ul>
                    <li>
                    3º Muestra el path donde se encuentra el fichero que se está ejecutando:
                    <?php 
                        echo "<br>";
                        echo(__DIR__);  
                    ?>
                    </li>
                </ul>
            
            </p>
        </article>
        <article>
            <p>
                <ul>
                    <li>
                        4º Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18:
                        <?php
                            echo "<br>";
                            date_default_timezone_set('Europe/Madrid');
                            echo date("Y-m-d h:i:s "); 
                        ?>
                    </li>
                </ul>
            
            </p>
        </article>

        <article>
            <p>
                <ul>
                    <li>
                        6º Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de
                        mes de año, hh:mm:ss , Zona horaria). 
                        <?php
                            date_default_timezone_set('Europe/Lisbon');
                            echo "<br>";
                            echo date("Y-m-d h:i:s "). date_default_timezone_get();  
                        ?>
                    </li>
                </ul>
           
            </p>
        </article>
        <article>
            <p>
                <ul>
                    <li>
                        7º Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy 
                        de tu cumpleaños
                        <br>
                        <?php
                            $fecha1 = strtotime("2001-09-29");
                            $fecha2 = date("29-09-2001");
                            echo "timestamp:".$fecha1;
                            echo "<br>";
                            echo "Fecha:".$fecha2;
                        ?>
                    </li>
                </ul>
            
            </p>
        </article>
        <article>
            <p>
                <ul>
                    <li>
                        8º Calcular la fecha y el día de la semana de dentro de 60 días
                        <?php   
                            echo "Fecha actual:";
                            $fecha=date("d-m-Y");
                            echo $fecha;
                            echo "<br/>";
                            echo "Fecha dentro de 60 días:";
                            $fecha_futura = strtotime('+60 day', strtotime($fecha));
                            $fecha_futura=date("d-m-Y", $fecha_futura);
                            echo $fecha_futura;
                        ?>
                    </li>
                </ul>
            
            </p>
        </article>
    </section>
    <a href="../index.html">Volver al Índice</a>
    <footer>
        <a href="verPag1.php">Ver código de la página</a>
    </footer>
    
</body>
</html>