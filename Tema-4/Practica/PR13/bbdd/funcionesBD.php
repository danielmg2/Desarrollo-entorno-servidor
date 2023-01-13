<?php
require('./conexionBD.php');



//Funcion que ejecuta un select en la base de datos INFORMATION_SCHEMA para comprobar si la base de datos existe o no
function compruebaBase(){
    try{

        //Se lee toda la tabla
        $conexion = new PDO('mysql:host='.HOST.';dbname=information_schema', USER, PASS);
        $sql = "select SCHEMA_NAME FROM SCHEMATA WHERE SCHEMA_NAME = 'peliculas';";
        $preparada = $conexion->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$name);

        while($row =$preparada->fetch(PDO::FETCH_BOUND)){
            return $name;
        }
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}


//Function que ejecuta un select para buscar el valor maximo del id de la tabla
function buscaID(){
    try{

        //Se lee toda la tabla
        $conexion = new PDO('mysql:host='.HOST.';dbname=peliculas', USER, PASS);
        $sql = 'Select MAX(id) from pelicula;';
        $preparada = $conexion->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$id);
        
        //Ver el select
        while($row =$preparada->fetch(PDO::FETCH_BOUND)){
            return $id;
        }
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}


//Function que ejecuta un select de todos los valores de la tabla
function primeraConsulta(){
    try{

        //Se lee toda la tabla
        $conexion = new PDO('mysql:host='.HOST.';dbname=peliculas', USER, PASS);
        $sql = 'Select * from pelicula;';
        $preparada = $conexion->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$id);
        $preparada->bindColumn(2,$nombre);
        $preparada->bindColumn(3,$puntuacion);
        $preparada->bindColumn(4,$fecha);


        //Ver el select
        echo "<div>";
        echo "<table>";
        while($row = $preparada->fetch(PDO::FETCH_BOUND)){
            ?>
            <tr>
                <td>ID:<?php echo $id ?></td>
                <td>Nombre:<?php echo $nombre ?></td>
                <td>Puntuación:<?php echo $puntuacion ?></td>
                <td>Fecha :<?php echo $fecha ?></td>
                <td>
                    <form action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
                        <input type="submit" value="Modificar" name="modificar">
                        <input type="submit" value="borrar" name="borrar">
                        <input type="hidden" name="clave" value="<?php echo $id ?>">
                    </form>
                </td>
                <td>
                    <form action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
                        <input type="hidden" name="clave" value="<?php echo $id ?>">
                        <input type="submit" value="buscar" name="buscar">
                    </form>
                </td>
            </tr>

        <?php
        }
            echo "</table>";
            echo "</div>";

    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}



//Function que ejeuta un select donde la id es igual al valor pasado por argumentos
function consulta($valor){
    try{
        //Se lee toda la tabla
        $conexion = new PDO('mysql:host='.HOST.';dbname=peliculas', USER, PASS);
        $sql = 'Select * from pelicula where id = :id;';
        $preparada = $conexion->prepare($sql);
        $array = array(":id"=>$valor);
        $preparada->execute($array);
        
        
        //Ver el select
        $preparada->bindColumn(1,$id);
        $preparada->bindColumn(2,$nombre);
        $preparada->bindColumn(3,$puntuacion);
        $preparada->bindColumn(4,$fecha);
        echo "<div>";
        echo "<table>";
        while($row = $preparada->fetch(PDO::FETCH_BOUND)){
            ?>
            <tr>
                <td>ID:<?php echo $id ?></td>
                <td>Nombre:<?php echo $nombre ?></td>
                <td>Puntuación:<?php echo $puntuacion ?></td>
                <td>Fecha :<?php echo $fecha ?></td>
                <td>
                    <form action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
                        <input type="submit" value="Modificar" name="modificar">
                        <input type="submit" value="borrar" name="borrar">
                        <input type="hidden" name="clave" value="<?php echo $id ?>">
                    </form>
                </td>
            </tr>

        <?php
        }
        echo "</table>";
        echo "</div>";

    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}




//Function que inserta los valores pasados por argumentos en la tabla pelicula;
function inserta($valorID,$valorNombre,$valorPuntos,$valorFecha){
    try{
        $conexion = new PDO('mysql:host='.HOST.';dbname=peliculas', USER, PASS);
        $sql='insert into pelicula values(:id,:nombre,:puntuacion,:fecha);';
        $preparada = $conexion->prepare($sql);
        $array = array(":id"=>$valorID,":nombre"=>$valorNombre,":puntuacion"=>$valorPuntos,":fecha"=>$valorFecha);
        $preparada->execute($array);
        

    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}


//Function que actualiza los valores de una pelicula donde id = valorID
function actualiza($valorID,$valorNombre,$valorPuntos,$valorFecha){
    try{
        $conexion = new PDO('mysql:host='.HOST.';dbname=peliculas', USER, PASS);
        $sql = 'update pelicula set nombre = :nombre, puntuacion = :puntuacion, fecha= :fecha  where id= :id';
        $preparada = $conexion->prepare($sql);
        $array = array(":id"=>$valorID,":nombre"=>$valorNombre,":puntuacion"=>$valorPuntos,":fecha"=>$valorFecha);
        $preparada->execute($array);
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }

}



//Function que borra los valores donde id=valor
function borra($valor){
    try{
        $conexion = new PDO('mysql:host='.HOST.';dbname=peliculas', USER, PASS);
        $sql = 'delete from pelicula where id= :id ';
        $preparada = $conexion->prepare($sql);
        $array = array(":id"=>$valor);
        $preparada->execute($array);
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}