<?php
    require("./validaForm.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>PR08</title>
</head>
<body>
    <header>PR08 Validación de formularios</header>
    <div>

    
    <form action=" ./formulario.php" method ="post" enctype="multipart/form-data">
        
        <!-- Nombres -->
            <P><b>Nombre:</b>
                
                <input type = "text" name = "nombre" id = "idnombre" placeholder="Nombre"
                value ="<?php
                    if(enviado() && !vacio("nombre")){
                        echo $_REQUEST["nombre"];
                    }
                ?>">
    
                <?php
                    if(vacio("nombre") &&  enviado()){
                        ?>
                        <span>------>Debe rellenar el nombre</span>
                        <?php
                    }
                ?>
            </p>
            <P><b>Nombre Opcional:</b>
                <input type = "text" name = "nombreOp" id = "idnombreOp" placeholder="Nombre opcional"
                value ="<?php
                    if(enviado() && !vacio("nombreOp")){
                        echo $_REQUEST["nombreOp"];
                    }
                ?>">
                
            </p>
            
    
        <!-- Apellidos -->
            <p><b>Apellidos:</b>
                <input type = "text" name = "apellidos" id = "idApellido" placeholder="Apellidos"
                value="<?php
                    if(enviado() && !vacio("apellidos")){
                        echo $_REQUEST["apellidos"];
                    }
                
                ?>">
                
                <?php
                if(enviado() && vacio("apellidos")){
                    ?>
                        <span>------>Debe enviar apellidos</span>
                    <?php
                }
                ?>
            </P>
            <p><b>Apellidos Opcional:</b>
                <input type = "text" name = "apellidosOp" id = "idApellidoOp" placeholder="Apellidos Opcional"
                value="<?php
                    if(enviado() && !vacio("apellidosOp")){
                        echo $_REQUEST["apellidosOp"];
                    }
                
                ?>">   
            </P>
            
            <!-- Fechas -->
            <p><b>Fecha de nacimiento:</b>
                <input type = "date" name = "nacimiento" id = "idNacimiento" 
                value="<?php
                    if(enviado() && !vacio("nacimiento")){
                        echo $_REQUEST["nacimiento"];
                    }
                ?>">
            
                <?php
                    if(enviado()&& vacio("nacimiento")){
                        ?>
                            <span>------>Debe introducir su fecha de nacimiento</span>
                        <?php
                    }
                ?>
            </p>
            <p><b>Fecha de nacimiento:</b>
                <input type = "date" name = "nacimientoOp" id = "idNacimientoOp" 
                value="<?php
                    if(enviado() && !vacio("nacimientoOp")){
                        echo $_REQUEST["nacimientoOp"];
                    }
                ?>">
            </p>
            
            <!-- Genero -->
            <p><b>Genero:</b>
                <label for="Masculino">Masculino</label>
                <input type="radio" name = "genero" id = "idMasculino" value = "Masculino"
                
                <?php
                    if(enviado() && existe("genero") && $_REQUEST["genero"]=="Masculino"){
                        echo "checked";
                    }
                ?>
                >
                
                <label for="Femenino">Femenino</label>
                <input type="radio" name = "genero" id = "idFemenino" value = "Femenino"
                
                <?php
                    if(enviado() && existe("genero") && $_REQUEST["genero"]=="Femenino"){
                        echo "checked";
                    }
                ?>
                >
    
                <?php
                    if(enviado() && vacio("genero")){
                        ?>
                            <span>------>Debe introducir su genero</span> 
                        <?php
                    }
                ?>
            </p>
           
    
            <p><b>Elige una opción:</b>
                <select name="curso" id="idCurso">       
                    <option value="0">Seleccione una opción</option>
                    <option value="1"<?php 
                    if(enviado() && existe("curso") && $_REQUEST["curso"]==1){
                        ?>
                        selected
                        <?php
                    }
                    ?>>DWES</option>
                    <option value="2"<?php 
                    if(enviado() && existe("curso") && $_REQUEST["curso"]==2){
                        ?>
                        selected
                        <?php
                    }
                    ?>>DWEC</option>
                    <option value="3"<?php 
                    if(enviado() && existe("curso") && $_REQUEST["curso"]==3){
                        ?>
                        selected
                        <?php
                    }
                    ?>>DAW</option>
                    <option value="4"<?php 
                    if(enviado() && existe("curso") && $_REQUEST["curso"]==4){
                        ?>
                        selected
                        <?php
                    }
                    ?>>DIW</option>
                    <option value="5"<?php 
                    if(enviado() && existe("curso") && $_REQUEST["curso"]==5){
                        ?>
                        selected
                        <?php
                    }
                    ?>>Empresa</option>      
                </select>

                <?php
                if(enviado() && existe("curso") && $_REQUEST["curso"]==0){
                    ?>
                    <span>------>Elija una opción valida</span>
                    <?php
                }
                ?>
            </p>
    
            <p><b>Eliga 1 minimo 3 maximo</b>
            <br>
                <label for="check1">ck1</label>
                <input type="checkbox" name ="check[]" id="c1" value="check1">
    
                <label for="check2">ck2</label>
                <input type="checkbox" name ="check[]" id="c2" value="check2">
                
                <label for="check3">ck3</label>
                <input type="checkbox" name ="check[]" id="c3" value="check3">
    
                <label for="check4">ck4</label>
                <input type="checkbox" name ="check[]" id="c4" value="check4">
                
                <label for="check5">ck5</label>
                <input type="checkbox" name ="check[]" id="c5" value="check5">
                
                <label for="check6">ck6</label>
                <input type="checkbox" name ="check[]" id="c6" value="check6">
                <?php
                    if(enviado() && (vacio($_REQUEST["check"])||$_REQUEST["check"]>3)){
                        ?>
                            <span>------>Debe seleccionar por lo menos 1 y maximo 3</span> 
                        <?php
                    }
                ?>
                
            </p>
    
            <p>
                <label for="telefono">Nº de telefono</label>
                <input type="number" name = "telefono" min="100000000" max="999999999" id="idTelef" placeholder ="666666666"  value="<?php
                    if(enviado() && !vacio("telefono") && $_REQUEST["telefono"] ){
                        echo $_REQUEST["telefono"];
                    }
                ?>">
                <?php
                    if(enviado() && vacio("telefono")){
                        ?>
                            <span>------>Debe introducir su telefono</span> 
                        <?php
                    }
                ?>

            </p>
            
            <p><b>Email:</b>
                <input type="text" name = "email" id="idEmail" placeholder ="----@----.com" value="<?php
                    if(enviado() && !vacio("email") && $_REQUEST["email"]){
                        echo $_REQUEST["email"];
                    }
                ?>">
                <?php
                    if(enviado() && vacio("email")){
                        ?>
                            <span>------>Debe introducir su email</span> 
                        <?php
                    }
                ?>

            </p>
            
            <p><b>Contraseña</b>
                <input type="password" name = "contraseña" id="idPass"value="<?php if(enviado()&&!vacio("contraseña")){
                    echo $_REQUEST["contraseña"];
                }?>">
                <?php
                    if(enviado() && vacio("contraseña")){
                        ?>
                            <span>------>Debe introducir su contraseña</span> 
                        <?php
                    }
                ?>
            </p>
            
            <p>
                <label for="fichero">Seleccionar archivo</label>
                <input type="file" name = "fichero" id="idFich" value="<?php
                    if(enviado() && !vacio("fichero")){
                        echo $_REQUEST["fichero"];
                    }
                    
                ?>" >


                <?php
                    if(enviado() && vacio("fichero")){
                        ?>
                            <span>------>Debe enviar un archivo</span> 
                        <?php
                    }
                ?>
            </p>
    
            <p>
                <input type="submit" value= "Enviar" name ="enviado">
            </p>
        </form>
    </div>
    

    <a href="/">Volver al Inicio</a>
    <footer><a href="verPag.php">Ver Código</a></footer>
</body>
</html>