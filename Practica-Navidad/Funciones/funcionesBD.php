<?php
// require ('../seguro/conexionBD.php');

//Funcion que ejecuta un select en la base de datos INFORMATION_SCHEMA para comprobar si la base de datos existe o no
function compruebaBase(){
    try{
        //Se lee toda la tabla
        $conexion = new PDO('mysql:host='.HOST.';dbname=information_schema', USER, PASS);
        $sql = "select SCHEMA_NAME FROM SCHEMATA WHERE SCHEMA_NAME = 'camisetas';";
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



// VALIDA LAS CREDENCIALES QUE HA INGRESADO EL USUARIO PARA INICIAR SESION
function validaCredenciales($user,$pass){
    $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
    $sql = "select usuario, contraseña from usuarios where usuario = ? and contraseña = ?";
    $sql_p = $con->prepare($sql);
    $array = array($user,$pass);
    $sql_p->execute($array);
//Si la consulta devuelve una linea
    if($sql_p->rowCount() ==1){
        //Si no hay sesion iniciada
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $_SESSION['user']=$user;
        $_SESSION['validadoC']= true;
        $row = $sql_p->fetch();
        //Si las contraseñas pasadas estan en la base de datos entonces devuelvo true y cierro la conexion
        if(($pass==$row['contraseña'])&&($user==$row['usuario'])){
            unset($con);
            return true;    
        }else{
            //si no estan los datos buscados devuelvo false
            unset($con);
            return false;
        }

    }else{
        //si devuelve mas de una linea devuelvo false;
        unset($con);
        return false;
    }
}






// VALIDA EL TIPO DE USUARIO QUE ES
function validaUser($user){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql = "select * from roles where usuario = ?";
        $sql_p = $con->prepare($sql);
        $array = array($user);
        $sql_p->execute($array);
        // unset($con);
        if($sql_p->rowCount() ==1){
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            $_SESSION['validado']= true;
            $row = $sql_p->fetch();
            $_SESSION['user']=$user;
            $_SESSION['perfil'] = $row['rol'];
            unset($con);
            return true;    
        }else{
            unset($con);
            return false;
        }

    }catch(Exception $es){
        print_r($es);
        unset($con);

    }

}



//FUNCION QUE CONSULTA DE PRODUCTOS Y LOS MUESTRA EN UNA TABLA
function leeProductos(){
    try{
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        //Se lee toda la tabla
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql = 'Select * from productos;';
        $preparada = $con->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$id);
        $preparada->bindColumn(2,$nombre);
        $preparada->bindColumn(3,$descripcion);
        $preparada->bindColumn(4,$precio);
        $preparada->bindColumn(5,$stock);


        //Ver el select
        echo "<div id='divTabla'>";
        echo "<table>";
        ?>
        <tr>
            <td>ID:</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Stock</td>
        </tr>
        <?php
        while($row = $preparada->fetch(PDO::FETCH_BOUND)){
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $nombre ?></td>
                <td><?php echo $descripcion ?></td>
                <td><?php echo $precio ?></td>
                <td><?php echo $stock ?></td>
                <td>
                    <form action="../Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">
                        <?php
                        
                            if(($_SESSION['perfil']=='moderador')){
                                ?>
                                    <label for="cantidad">Pedido:</label>
                                    <input type="number" name="cantidad" id="cantidad" value="0" min="0" >
                                    <input type="submit" value="Pedir" name="pedir">  
                                    <input type="hidden" name="clave" value="<?php echo $id ?>">
                                <?php
                            }else if($_SESSION['perfil']=='usuario'){
                                ?>
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php echo $stock ?>">  
                                    <input type="submit" value="comprar" name="comprar">
                                    <input type="hidden" name="clave" value="<?php echo $id ?>">
                                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                                <?php
                            }else if($_SESSION['perfil']=='administrador'){
                                ?>
                                    <label for="cantidad">Pedido:</label>
                                    <input type="number" name="cantidad" id="cantidad" value="0" min="0" >
                                    <input type="submit" value="Pedir" name="pedir">  
                                    <input type="submit" value="Modificar" name="modificar">
                                    <input type="hidden" name="tabla" value="productos">
                                    <input type="submit" value="Borrar" name="borrar">
                                    <input type="hidden" name="clave" value="<?php echo $id ?>">
                                <?php
                            }
                        ?>
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

//FUNCION QUE CONSULTA LAS VENTAS Y LAS MUESTRA EN UNA TABLA
function leeVentas(){
    try{
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        //Se lee toda la tabla
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql = 'Select * from ventas;';
        $preparada = $con->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$id);
        $preparada->bindColumn(2,$usuario);
        $preparada->bindColumn(3,$fecha_compra);
        $preparada->bindColumn(4,$cod_producto);
        $preparada->bindColumn(5,$cantidad);
        $preparada->bindColumn(6,$precio_total);


        //Ver el select
        echo "<div id='divTabla'>";
        echo "<table>";
        ?>
        <tr>
            <td>ID:</td>
            <td>Usuario:</td>
            <td>Fecha de compra:</td>
            <td>Codigo de producto:</td>
            <td>Cantidad:</td>
            <td>Precio total:</td>
        </tr>
        <?php
        while($row = $preparada->fetch(PDO::FETCH_BOUND)){
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $usuario ?></td>
                <td><?php echo $fecha_compra ?></td>
                <td><?php echo $cod_producto ?></td>
                <td><?php echo $cantidad ?></td>
                <td><?php echo $precio_total ?></td>
                <td>
                    <form action="../Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">
                        <?php
                            if(($_SESSION['perfil']=='administrador')||($_SESSION['perfil']=='moderador')){
                                ?>
                                    <input type="hidden" name="tabla" value="ventas">
                                    <input type="submit" value="modificar" name="modificar">
                                    <input type="submit" value="borrar" name="borrar">
                                    <input type="hidden" name="clave" value="<?php echo $id ?>">
                                <?php
                            }
                        ?>
                        <input type="hidden" name="claveProd" value="<?php echo $cod_producto ?>">
                        <input type="hidden" name="clave" value="<?php echo $id ?>">
                        <input type="hidden" name="precio" value="<?php echo $precio ?>">
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







//FUNCION QUE CONSULTA DE ALBARANES Y LOS MUESTRA EN UNA TABLA
function leeAlbaran(){
    try{
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        //Se lee toda la tabla
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql = 'Select * from albaran;';
        $preparada = $con->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$id);
        $preparada->bindColumn(2,$fecha_albaran);
        $preparada->bindColumn(3,$cod_producto);
        $preparada->bindColumn(4,$cantidad);
        $preparada->bindColumn(5,$usuario);


        //Ver el select
        echo "<div id='divTabla'>";
        echo "<table>";
        ?>
        <tr>
            <td>ID:</td>
            <td>Fecha de compra:</td>
            <td>Codigo de producto:</td>
            <td>Cantidad:</td>
            <td>Usuario:</td>
        </tr>
        <?php
        while($row = $preparada->fetch(PDO::FETCH_BOUND)){
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $fecha_albaran ?></td>
                <td><?php echo $cod_producto ?></td>
                <td><?php echo $cantidad ?></td>
                <td><?php echo $usuario ?></td>
                <td>
                    <form action="../Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">
                        <?php
                            if(($_SESSION['perfil']=='administrador')||($_SESSION['perfil']=='moderador')){
                                ?>
                                    <input type="hidden" name="tabla" value="albaran">
                                    <input type="submit" value="modificar" name="modificar">
                                    <input type="submit" value="borrar" name="borrar">
                                    <input type="hidden" name="clave" value="<?php echo $id ?>">
                                <?php
                            }
                        ?>
                        <input type="hidden" name="claveProd" value="<?php echo $cod_producto ?>">
                        <input type="hidden" name="clave" value="<?php echo $id ?>">
                        <input type="hidden" name="precio" value="<?php echo $precio ?>">
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
function nuevoUser($user,$contrasena,$email,$fecha){
    try{
        
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql='insert into usuarios values(:user,:contrasena,:email,:fecha);';
        $preparada = $con->prepare($sql);
        $array = array(":user"=>$user,":contrasena"=>$contrasena,":email"=>$email,":fecha"=>$fecha);
        $preparada->execute($array);




        $sql='insert into roles values(:rol,:usuario);';
        $preparada = $con->prepare($sql);
        $array = array(":rol"=>"usuario",":usuario"=>$user);
        

    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}

//Function que inserta los valores pasados por argumentos;
function nuevoProducto($nombre,$descripcion,$precio,$stock){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql='insert into productos values(:id,:nombre,:descripcion,:precio,:stock);';
        $preparada = $con->prepare($sql);
        $array = array(":id"=>null,":nombre"=>$nombre,":descripcion"=>$descripcion,":precio"=>$precio,":stock"=>$stock);
        $preparada->execute($array);
        


    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}
//Function que inserta los valores pasados por argumentos en la tabla pelicula;

function nuevoVenta($usuario,$fecha_compra,$cod_producto,$cantidad,$precio){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        //Selecionar cuanto stock queda
        //Comprobar que no es 0
        //Si no es 0 se resta
        $sql="select stock from productos where id=:id";
        $preparada = $con->prepare($sql);
        $array= array(":id"=>$cod_producto);
        $preparada->execute($array);

        $preparada->bindColumn(1,$stock);
        $row =$preparada->fetch(PDO::FETCH_BOUND);
        // while($row =$preparada->fetch(PDO::FETCH_BOUND)){ 
        // }

        if($stock>0){
          
            $nuevo_stock=$stock-$cantidad;
            $sql = 'update productos set stock = :nuevo_stock where id= :id';
            $preparada = $con->prepare($sql);
            $array= array(":nuevo_stock"=> $nuevo_stock,":id"=>$cod_producto);
            $preparada->execute($array);
            
            
            $sql='insert into ventas values(:id,:usuario,:fecha_compra,:cod_producto,:cantidad,:precio_total);';
            $precio_total=$cantidad*$precio;
            $preparada = $con->prepare($sql);
            $array = array(":id"=>null,":usuario"=>$usuario,":fecha_compra"=>$fecha_compra,":cod_producto"=>$cod_producto,":cantidad"=>$cantidad,"precio_total"=>$precio_total);
            $preparada->execute($array);
        }



    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}


//Function que inserta los valores pasados por argumentos en la tabla albaran;
function nuevoAlbaran($fecha_albaran,$cod_producto,$cantidad,$usuario){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql="select stock from productos where id=:id";
        $preparada = $con->prepare($sql);
        $array= array(":id"=>$cod_producto);
        $preparada->execute($array);

        $preparada->bindColumn(1,$stock);
        $row =$preparada->fetch(PDO::FETCH_BOUND);
        
        
        if($cantidad>0){
            $nuevo_stock=$stock+$cantidad;
            

            $sql = 'update productos set stock = :nuevo_stock where id= :id';
            $preparada = $con->prepare($sql);
            $array= array(":nuevo_stock"=> $nuevo_stock,":id"=>$cod_producto);
            $preparada->execute($array);
        }
        
        $sql='insert into albaran values(:id_albaran,:fecha_albaran,:cod_producto,:cantidad,:usuario);';
        $preparada = $con->prepare($sql);
        $array = array(":id_albaran"=>null,":fecha_albaran"=>$fecha_albaran,":cod_producto"=>$cod_producto,":cantidad"=>$cantidad,":usuario"=>$usuario);
        $preparada->execute($array);
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
    }finally{
        unset($conexion);
    }
}


function modProducto($id,$nombre,$descripcion,$precio,$stock){
    try{

        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        // $sql="select stock from productos where id=:id";
        // $preparada = $con->prepare($sql);
        // $array= array(":id"=>$id);
        // $preparada->execute($array);

        // $preparada->bindColumn(1,$stock);
        // $row =$preparada->fetch(PDO::FETCH_BOUND);
        
        $sql = 'update productos set nombre = :nombre, descripcion = :descripcion, precio = :precio, stock= :stock  where id= :id';
        $preparada = $con->prepare($sql);
        $array = array(":id"=>$id,":nombre"=>$nombre,":descripcion"=>$descripcion,":precio"=>$precio,":stock"=>$stock);
        $preparada->execute($array);


       
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}




function modUser($usuario,$contrasena,$email,$fecha){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql = 'update usuarios set contraseña = :contrasena, email=:email, fecha= :fecha where usuario = :usuario';
        $preparada = $con->prepare($sql);
        $array = array(":usuario"=>$usuario,":contrasena"=>$contrasena,":email"=>$email,":fecha"=>$fecha);
        $preparada->execute($array);
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}



function modVenta($id,$usuario,$fecha,$cod_producto,$cantidad,$precio){
    try{

        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        
        $sql = 'update ventas set usuario = :usuario, fecha_compra = :fecha, cod_producto= :cod_producto, cantidad = :cantidad, precio_total = :precio  where id= :id';
        $preparada = $con->prepare($sql);
        $precio_total=$precio*$cantidad;
        $array = array(":id"=>$id,":usuario"=>$usuario,":fecha"=>$fecha,":cod_producto"=>$cod_producto,":cantidad"=>$cantidad,":precio"=>$precio_total);
        $preparada->execute($array);
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}

function modAlbaran($id,$usuario,$fecha,$cod_producto,$cantidad){
    try{

        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        
        $sql = 'update albaran set fecha_albaran = :fecha, cod_producto= :cod_producto, cantidad = :cantidad, usuario = :usuario where id_albaran= :id';
        $preparada = $con->prepare($sql);
        $array = array(":id"=>$id,":fecha"=>$fecha,":cod_producto"=>$cod_producto,":cantidad"=>$cantidad,":usuario"=>$usuario);
        $preparada->execute($array);
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}


//Function que borra los valores donde id=valor de la tabla productos
function borrar($tabla,$valor){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        if($tabla =="productos"){
            $sql = 'delete from productos where id=:id ';
        }else if($tabla =="ventas"){
            $sql = 'delete from ventas where id=:id ';
        }else if($tabla =="albaran"){
            $sql = 'delete from albaran where id_albaran=:id ';

        }
        $preparada =  $con->prepare($sql);
        $array = array(":id"=>$valor);
        $preparada->execute($array);
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }
}

function maxIdProducto(){
    try{
        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql = 'select MAX(id) from productos';
        $preparada = $con->prepare($sql);
        $preparada->execute();
        $preparada->bindColumn(1,$id);
        $row =$preparada->fetch(PDO::FETCH_BOUND);
        return $id;
        
    }catch(Exception $ex){
        echo "Error:";
        print_r($ex);
        
    }finally{
        unset($conexion);
    }

}