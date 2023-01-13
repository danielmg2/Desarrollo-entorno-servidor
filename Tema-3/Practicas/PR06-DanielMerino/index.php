<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Document</title>
</head>
<body>
    <header>Ejercicio tablas de la liga</header>
    <h2>Tabla de la clasificación</h2>
    <table>
    <?php
        $liga =
        array(
            "Zamora" =>  array(
                "Salamanca" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                )
            ),
            "Salamanca" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                )
            ),
            "Avila" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                ),
                "Salamanca" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                )
            ),
            "Valladolid" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Salamanca" => array(
                    "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                )
            ),
        );
    ?> 
        <?php

            //Muestro la primera fila
            echo("<tr>");
            echo("<td>");
            echo("EQUIPOS");
            echo("</td>");
            //Primera fila
            foreach ($liga as $key => $value) {
                # code...
                echo("<td>");
                echo($key);
                echo(" ");  
                echo("</td>");
            }


            echo("</tr>");
            echo("<br>");
            $filas=0;
            $cont=0;
            //Recorro filas
            foreach ($liga as $nombre => $valor) {
                echo("<tr>");
                # code...
                echo("<td>");
                echo ($nombre);
                echo("</td>");
                //Recorro valores
                foreach($valor as $puntos =>$nombre){
                    if($filas==$cont){
                        echo("<td></td>");       
                    }
                    echo("<td>");

                    $cont++;
                        //Puntos de cada equipo
                        foreach ($nombre as $clave => $valor) {
                            # code...
                            
                            if($clave=="Resultado"){
                                echo "<p>";
                                echo($valor);
                                echo "</p>";
                            }
                            else{   
                                                        
                                echo($valor);                         
                            }                     
                        }                           
                    echo("</td>");
                }
                
                if($filas==3){
                    echo("<td></td>"); 
                }
                echo("</tr>");
                $cont=0;
                $filas++;
            }
        ?>  
        
    </table> 
    
    <br>
    <br>
    
    <?php
        $ciudades=array();
        $goles=array();
            //Creación de array de ciudades
            foreach ($liga as $key => $value) {
                # code...
                array_push($ciudades,$key);
                //echo($key);
                foreach($value as $puntos =>$nombre){
                    //puntos
                    foreach ($nombre as $clave => $valor) {
                        //echo($valor);
                        if($clave=="Resultado"){  
                            array_push($goles, $valor);
                        }
                    }
                }
            }                 
            
            //print_r($goles);
            
        ?>
<h2>Tabla de la puntuación</h2>
    <table >
        <tr>
            <td>EQUIPO</td>
            <td>PUNTOS</td>
            <td>GOLES A FAVOR</td>
            <td>GOLES EN CONTRA</td>
        </tr>
        <?php
            
            //Variable para controlar la ciudad
            $cont=0;
            //Contador de victorias
            $victoria=0;

            //Puntos a favor y en contra
            $favor=0;
            $contra=0;

            //Primera fila
            foreach ($ciudades as $ciudad => $valor) {
                echo"<tr>";
                echo "<td>";
                # code...
                echo($valor);
                echo "</td>";

                //Recorrer los puntos
                for($i=0; $i<3;$i++){
                    //echo "<br>i:".$i."<br>";
                    $gol=explode("-", $goles[$cont]);

                    //Goles a favor y en contra
                    $favor+=$gol[0];
                    $contra+=$gol[1];
                    //Partidos ganados
                    if(($gol[0]>$gol[1])){
                        $victoria+=3;
                        
                        
                        
                    }
                    $cont++;
                }
                echo "<td>";
                echo $victoria;
                echo "</td>";
                echo "<td>";
                echo $favor;
                echo "</td>";
                echo "<td>";
                echo $contra;
                echo "</td>";

                $victoria=0;
                $favor=0;
                $contra=0;
                
                    
                echo "</tr>";        
            }
            
        ?>     
    </table>
    <br>
    <br>
    <br>
<footer><a href="./verpag.php">Ver código</a></footer>
</body>
</html>