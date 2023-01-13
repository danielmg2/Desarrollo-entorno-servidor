<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    <header>PR010 Lectura de CSV</header>
    
    <?php
       
        if(isset($_REQUEST["guardar"])){
            $datos=array();
            if(!$fp=fopen("notas.csv", "r")){
                echo "A ocurrido un error al abrir el archivo";
            }else{
                while(($fila=fgetcsv($fp,0,";"))!==false){
                    echo "<tr>";
                    $valores=array();
                    foreach ($fila as $numeroColumna => $columna) {
                        array_push($valores,$columna);
                        
                    }
                    array_push($datos,$valores);
                }
            }
            fclose($fp);
            //variable para controlar que se ha encontrado el nombre del alumno que se quiere cambiar
            $encontrado=false;
            //Array con los datos cambiados
            $reemplazo=array($_REQUEST["nombre"],$_REQUEST["texto1"],$_REQUEST["texto2"],$_REQUEST["texto3"]);        
            foreach($datos as $key=>$valores){
                foreach($valores as $posicion =>$valor){
                    //Si el nombre pasado es igual al de $posicion entonces se ha encontrado el nombre correcto
                    if($_REQUEST["nombre"]==$valores[$posicion]){
                        $encontrado=true;
                    }
                    //Si se encuentra entonces se reemplaza en el array valores y en datos
                    if($encontrado==true){   
                        $valores[$posicion]=$reemplazo[$posicion];
                        $datos[$key]=$valores;
                    }
                    
                }
                $encontrado=false;
            }
            
            //ESCRIBIR
            if(!$fp=fopen("notas.csv", "w")){
                echo "A ocurrido un error al abrir el archivo";
            }else{
                foreach ($datos as $valores) {
                    fputcsv($fp, $valores,";");
                }
            }
            fclose($fp);

            //VOLVER A LEER PARA MOSTRAR LA TABLA DE NUEVO
            ?>
            <div id="tabla">
                Tabla de alumnos:
                <table >
                    <!-- Primera linea de la tabla -->
                    <tr>
                        <td>Alumno</td>
                        <td>Nota 1</td>
                        <td>Nota 2</td>
                        <td>Nota 3</td>
                        <td>Editar</td>
                    </tr>
            
                    <!-- Lectura del archivo csv -->
                    <?php
                    echo "LECTURA";
                        
                        $filas=0;
                        if(!$fp=fopen("notas.csv", "r")){
                            echo "A ocurrido un error al abrir el archivo";
                        }else{
                            while(($fila=fgetcsv($fp,0,";"))!==false){
                                echo "<tr>";
                                $filas++;
                                    foreach ($fila as $numeroColumna => $columna) {
                                        echo "<td>";    
                                        echo $columna;
                                        echo "</td>";
                                    }
                                    echo "<td>";
                                    ?>
                                <!-- Pasar mejor el nombre del alumno, para identificar en el array al editar -->
                                    <form action="./EditaCSV.php" method ="post" enctype="multipart/form-data">
                                        <input type="hidden" name="fila" value="<?php echo $fila[0]?>">
                                        <input type="submit" value="Editar" name="editar">
                                    </form>
                                    <?php
                                    echo "</td>";
                                echo "</tr>";
                            }
                            fclose($fp);
                        }
                    ?>
                </table>
            </div>
          <?php  
          //Aqui entra la primera vez que se entra en la pagina
        }else{
            ?>
            <div id="tabla">
                Tabla de alumnos:
                <table >
                    <!-- Primera linea de la tabla -->
                    <tr>
                        <td>Alumno</td>
                        <td>Nota 1</td>
                        <td>Nota 2</td>
                        <td>Nota 3</td>
                        <td>Editar</td>
                    </tr>
            
                    <!-- Lectura del archivo csv -->
                    <?php
                        
                        $filas=0;
                        if(!$fp=fopen("notas.csv", "r")){
                            echo "A ocurrido un error al abrir el archivo";
                        }else{
                            while(($fila=fgetcsv($fp,0,";"))!==false){
                                echo "<tr>";
                                $filas++;
                                    foreach ($fila as $numeroColumna => $columna) {
                                        echo "<td>";    
                                        echo $columna;
                                        echo "</td>";
                                    }
                                    echo "<td>";
                                    ?>
                                <!-- Pasar mejor el nombre del alumno, para identificar en el array al editar -->
                                    <form action="./EditaCSV.php" method ="post" enctype="multipart/form-data">
                                        <input type="hidden" name="fila" value="<?php echo $fila[0]?>">
                                        <input type="submit" value="Editar" name="editar">
                                    </form>
                                    <?php
                                    echo "</td>";
                                echo "</tr>";
                            }
                            fclose($fp);
                        }
                    ?>
                </table>
            </div>
          <?php  
        }
        ?>

<a id="volver" href="..">Volver</a>
<footer>
    <a href="./verPag.php?pagina=leeCSV.php">Ver Código</a>
    
</footer>
</body>
</html>