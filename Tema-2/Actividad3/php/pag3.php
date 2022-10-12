<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Página 3</title>
</head>
<body>
    <header>3º Página </header>
    <section>
        <article>
            <p>
                <ul>
                    <li>
                        Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre 
                        el día de la semana de dicho día. (Por defecto, dale el valor de 12/09/2022):
                        <br>
                        <br>
                        El día es:
                        <?php
                            $ano=$_GET["ano"];
                            $mes=$_GET["mes"];
                            $dia=$_GET["dia"];
                            
                            $timestamp = strtotime($ano-$mes-$dia);
                            $fecha= date("D", $timestamp);
                            
                            echo $fecha;
                        ?>
                    </li>
                </ul>
                
            </p>
        </article>
    </section>
    
    <a href="../index.html">Volver al Índice</a>
  
    <footer> <a href="verPag3.php">Ver código de la página</a></footer>
    
</body>
</html>