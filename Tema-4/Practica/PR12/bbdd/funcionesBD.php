<?php
require('./conexionBD.php');



//Funcion que ejecuta un select en la base de datos INFORMATION_SCHEMA para comprobar si la base de datos existe o no
function compruebaBase(){
    try{

        //Se lee toda la tabla
        $conexion = mysqli_connect(HOST,USER,PASS,'INFORMATION_SCHEMA');
        $sql = "select SCHEMA_NAME FROM SCHEMATA WHERE SCHEMA_NAME = 'peliculas';";
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        mysqli_stmt_execute($consulta_Preparada);
        // echo mysqli_stmt_num_rows($consulta_Preparada);


        //Ver el select
        mysqli_stmt_bind_result($consulta_Preparada,$r_nombre);
        while(mysqli_stmt_fetch($consulta_Preparada)){
            return $r_nombre;
        }
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}

//Function que ejecuta un select para buscar el valor maximo del id de la tabla
function buscaID(){
    try{

        //Se lee toda la tabla
        $conexion = mysqli_connect(HOST,USER,PASS,'peliculas');
        $sql = 'Select MAX(id) from pelicula;';
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        mysqli_stmt_execute($consulta_Preparada);
        


        //Ver el select
        mysqli_stmt_bind_result($consulta_Preparada,$r_id);
        while(mysqli_stmt_fetch($consulta_Preparada)){
            return $r_id;
            ?>
            
        <?php
        }
       
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}





//Function que ejecuta un select de todos los valores de la tabla
function primeraConsulta(){
    try{

        //Se lee toda la tabla
        $conexion = mysqli_connect(HOST,USER,PASS,'peliculas');
        $sql = 'Select * from pelicula;';
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        mysqli_stmt_execute($consulta_Preparada);
        // echo mysqli_stmt_num_rows($consulta_Preparada);


        //Ver el select
        mysqli_stmt_bind_result($consulta_Preparada,$r_id,$r_nombre,$r_puntuacion,$r_fecha);
        echo "<div>";
        echo "<table>";
        while(mysqli_stmt_fetch($consulta_Preparada)){
            ?>
            <tr>
                <td>ID:<?php echo $r_id ?></td>
                <td>Nombre:<?php echo $r_nombre ?></td>
                <td>Puntuación:<?php echo $r_puntuacion ?></td>
                <td>Fecha :<?php echo $r_fecha ?></td>
                <td>
                    <form action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
                        <input type="submit" value="Modificar" name="modificar">
                        <input type="submit" value="borrar" name="borrar">
                        <input type="hidden" name="clave" value="<?php echo $r_id ?>">
                    </form>
                </td>
                <td>
                    <form action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
                        <input type="hidden" name="clave" value="<?php echo $r_id ?>">
                        <input type="submit" value="buscar" name="buscar">
                    </form>
                </td>
            </tr>

        <?php
        }
        echo "</table>";
        echo "</div>";
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}



//Function que ejeuta un select donde la id es igual al valor pasado por argumentos
function consulta($valor){
    try{
        //Se lee toda la tabla
        $conexion = mysqli_connect(HOST,USER,PASS,'peliculas');
        $sql = 'Select * from pelicula where id = ?;';
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        $nombre= $valor;
        mysqli_stmt_bind_param($consulta_Preparada,'s',$nombre);
        mysqli_stmt_execute($consulta_Preparada);
        // echo mysqli_stmt_num_rows($consulta_Preparada);

        //Ver el select
        mysqli_stmt_bind_result($consulta_Preparada,$r_id,$r_nombre,$r_puntuacion,$r_fecha);
        echo "<div>";
        echo "<table>";
        while(mysqli_stmt_fetch($consulta_Preparada)){
            ?>
            <tr>
                <td>ID:<?php echo $r_id ?></td>
                <td>Nombre:<?php echo $r_nombre ?></td>
                <td>Puntuación:<?php echo $r_puntuacion ?></td>
                <td>Fecha :<?php echo $r_fecha ?></td>
                <td>
                    <form action="./redireccion.php"  method ="post" enctype="multipart/form-data">  
                        <input type="submit" value="Modificar" name="modificar">
                        <input type="submit" value="borrar" name="borrar">
                        <input type="hidden" name="clave" value="<?php echo $r_id ?>">
                    </form>
                </td>
            </tr>

        <?php
        }
        echo "</table>";
        echo "</div>";
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}


//Function que inserta los valores pasados por argumentos en la tabla pelicula;
function inserta($valorID,$valorNombre,$valorPuntos,$valorFecha){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS,'peliculas');
        $sql='insert into pelicula values(?,?,?,?);';
        $consulta_Preparada=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        $id=$valorID;
        $nombre=$valorNombre;
        $puntos=$valorPuntos;
        $fecha=$valorFecha;
        mysqli_stmt_bind_param($consulta_Preparada,'isds',$id,$nombre,$puntos,$fecha);
        mysqli_stmt_execute($consulta_Preparada);
        echo mysqli_stmt_num_rows($consulta_Preparada);
    
    
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}


//Function que actualiza los valores de una pelicula donde id = valorID
function actualiza($valorID,$valorNombre,$valorPuntos,$valorFecha){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS,'peliculas');
        $sql = 'update pelicula set nombre = ?, puntuacion = ?, fecha= ?  where id= ?';
        $consulta_Preparada=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        $id=$valorID;
        $nombre=$valorNombre;
        $puntos=$valorPuntos;
        $fecha=$valorFecha;
        mysqli_stmt_bind_param($consulta_Preparada,'sdsi',$nombre,$puntos,$fecha,$id);
        mysqli_stmt_execute($consulta_Preparada);
        echo mysqli_stmt_num_rows($consulta_Preparada);
    
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}



//Function que borra los valores donde id=valor
function borra($valor){
    try{
        $conexion = mysqli_connect(HOST,USER,PASS,'peliculas');
        $sql = 'delete from pelicula where id= ? ';
        $consulta_Preparada = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consulta_Preparada,$sql);
        $id=$valor;
        mysqli_stmt_bind_param($consulta_Preparada,'i',$id);
        mysqli_stmt_execute($consulta_Preparada);
        
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        echo $ex->getMessage();
        
    }finally{
        mysqli_close($conexion);
    }
}