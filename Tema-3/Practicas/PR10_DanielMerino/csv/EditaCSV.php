<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Editar CSV</title>
</head>
<body>
    <header>Editar CSV</header>
    <?php
        //Se pasa el nombre del alumno para comprobarlo y mostrar la fila
        $nombre=$_REQUEST["fila"];
        
        $delimitador=";";
        $cambio;
        //Se abre el fichero
        if(!$fp=fopen("notas.csv", "r")){
            echo "A ocurrido un error al abrir el archivo";
        }else{
            while(($fila=fgetcsv($fp,0,$delimitador))!==false){
                echo "<tr>";
                    
                //Si fila[0] es igual que el nombre entonces es la fila correcta
                    if($fila[0]==$nombre){
                        ?>
                        <div id="divAlumno">
                        <br>
                        <form action="./leeCSV.php" method ="post" enctype="multipart/form-data">
                        <?php
                            foreach ($fila as $numeroColumna => $columna) {
                               if($numeroColumna==0){
                                ?>
                                    <input type="text" name="nombre" id="idNombre" readonly value="<?php echo $columna?>">
                                <?php
                                }else{
                                ?>
                                    <input type="number" name="texto<?php echo $numeroColumna?>" id="texto" value="<?php echo $columna?>">
                                <?php
                               }
                            }
                        ?>
                        <!-- <input type="hidden" name="columnas" value="<?php count($fila)?>"> -->
                        <input type="submit" value="guardar" name="guardar">
                        </form>
                        </div>
                        <?php
                    }
                echo "</td>";
                echo "</tr>";
            }
            fclose($fp);
        }
    ?> 
    <a id="volver" href="..">Volver</a>
    <footer>
        <a href="./verPag.php?pagina=EditaCSV.php">Ver Código</a>
        
    </footer>   
</body>
</html>