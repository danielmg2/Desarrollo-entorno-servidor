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
    <?php
    if(valida()){
         muestra();
    }else{
    ?>
    <form action=" ./formulario.php" method ="post" enctype="multipart/form-data">
        
        <!-- Nombres--------------------------------------->
            <P><b>Nombre:</b>
                <!--Mantiene el texto introducido--------------------------------------->
                <input type = "text" name = "nombre" id = "idnombre" placeholder="Nombre"
                value ="<?php
                    if(enviado() && !vacio("nombre")){
                        echo $_REQUEST["nombre"];
                    }
                ?>">
                <!--Comprueba que este vacio--------------------------------------->
                <?php
                    if(vacio("nombre") &&  enviado()){
                        ?>
                        <span>------>Debe rellenar el nombre</span>
                        <?php
                    }
                ?>
            </p>
            <P><b>Nombre Opcional:</b>
                <!--Mantiene el texto introducido--------------------------------------->
                <input type = "text" name = "nombreOp" id = "idnombreOp" placeholder="Nombre opcional"
                value ="<?php
                    if(enviado() && !vacio("nombreOp")){
                        echo $_REQUEST["nombreOp"];
                    }
                ?>">
                
            </p>
            
    
        <!-- Apellidos--------------------------------------->
            <p><b>Apellidos:</b>
                <!--Mantiene el texto introducido--------------------------------------->
                <input type = "text" name = "apellidos" id = "idApellido" placeholder="Apellidos"
                value="<?php
                    if(enviado() && !vacio("apellidos")){
                        echo $_REQUEST["apellidos"];
                    }
                
                ?>">
                <!--Comprueba que este vacio--------------------------------------->
                <?php
                if(enviado() && vacio("apellidos")){
                    ?>
                        <span>------>Debe enviar apellidos</span>
                    <?php
                }
                ?>
            </P>
            <!--Mantiene el texto introducido--------------------------------------->
            <p><b>Apellidos Opcional:</b>
                <input type = "text" name = "apellidosOp" id = "idApellidoOp" placeholder="Apellidos Opcional"
                value="<?php
                    if(enviado() && !vacio("apellidosOp")){
                        echo $_REQUEST["apellidosOp"];
                    }
                
                ?>">   
            </P>
            
            <!-- Fechas--------------------------------------->
            <p><b>Fecha de nacimiento:</b>
            <!--Mantiene el texto introducido--------------------------------------->
                <input type = "date" name = "nacimiento" id = "idNacimiento" 
                value="<?php
                    if(enviado() && !vacio("nacimiento")){
                        echo $_REQUEST["nacimiento"];
                    }
                ?>">
            <!--Comprueba que este vacio--------------------------------------->
                <?php
                    if(enviado()&& vacio("nacimiento")){
                        ?>
                            <span>------>Debe introducir su fecha de nacimiento</span>
                        <?php
                    }
                ?>
            </p>
            <!--Mantiene el texto introducido--------------------------------------->
            <p><b>Fecha Opcional:</b>
                <input type = "date" name = "nacimientoOp" id = "idNacimientoOp" 
                value="<?php
                    if(enviado() && !vacio("nacimientoOp")){
                        echo $_REQUEST["nacimientoOp"];
                    }
                ?>">
            </p>
            
            <!-- Genero--------------------------------------->
            <p><b>Genero:</b>
            <!--Mantiene el texto introducido--------------------------------------->
                <label for="Masculino">Masculino</label>
                <input type="radio" name = "genero" id = "idMasculino" value = "Masculino"
                
                <?php
                    if(enviado() && existe("genero") && $_REQUEST["genero"]=="Masculino"){
                        echo "checked";
                    }
                ?>
                >
                <!--Mantiene el texto introducido--------------------------------------->
                <label for="Femenino">Femenino</label>
                <input type="radio" name = "genero" id = "idFemenino" value = "Femenino"
                
                <?php
                    if(enviado() && existe("genero") && $_REQUEST["genero"]=="Femenino"){
                        echo "checked";
                    }
                ?>
                >
                <!--Comprueba que este vacio--------------------------------------->
                <?php
                    if(enviado() && vacio("genero")){
                        ?>
                            <span>------>Debe introducir su genero</span> 
                        <?php
                    }
                ?>
            </p>
           
            <!-- Curso--------------------------------------->
            <p><b>Elige una opción:</b>
            <!--Mantiene el texto introducido--------------------------------------->
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

                <!--Comprueba que no sea 0--------------------------------------->
                <?php
                if(enviado() && existe("curso") && $_REQUEST["curso"]==0){
                    ?>
                    <span>------>Elija una opción valida</span>
                    <?php
                }
                ?>
            </p>
            <!-- Checks--------------------------------------->
            <p>
                
                <!-- CHECK OBLIGATORIOS DE 1 A 3 --> 
                <label>Elige al menos 1 y maximo 3:</label><br>
                <input type="checkbox" name="check[]" id="idCheck1" value="Check 1"
                <?php
                // Para mantener la eleccion elegida
                    if(enviado() && existe("check") && in_array("Check 1", $_REQUEST["check"]))
                    echo "checked";
                ?>>
                
                <label for="idCheck1">Check 1</label>
                <input type="checkbox" id="idCheck2" name="check[]" value="Check 2"
                <?php
                    if(enviado() && existe('check') && in_array("Check 2",$_REQUEST['check'])){
                        echo "checked";
                    }
                ?>>
                
                <label for="idCheck2">Check 2</label>
                <input type="checkbox" id="idCheck3" name="check[]" value="Check 3"
                <?php
                    if(enviado() && existe('check') && in_array("Check 3",$_REQUEST['check'])){
                        echo "checked";
                    }
                ?>>
                
                <label for="idCheck3">Check 3</label>
                <input type="checkbox" id="idCheck4" name="check[]" value="Check 4"
                <?php
                    if(enviado() && existe('check') && in_array("Check 4",$_REQUEST['check'])){
                        echo "checked";
                    }
                ?>>
                
                <label for="idCheck4">Check 4</label>
                <input type="checkbox" id="idCheck5" name="check[]" value="Check 5"
                <?php
                    if(enviado() && existe('check') && in_array("Check 5",$_REQUEST['check'])){
                        echo "checked";
                    }
                ?>>
                
                <label for="idCheck5">Check 5</label>
                <input type="checkbox" id="idCheck6" name="check[]" value="Check 6"
                <?php
                    if(enviado() && existe('check') && in_array("Check 6",$_REQUEST['check'])){
                        echo "checked";
                    }
                ?>>
                <label for="idCheck6">Check 6</label>

                <!-- Comprobar que se seleccionan de 1 a 3 opciones -->
                <?php
                    if (!existe('check') && enviado()) {
                        ?>
                            <span>------>Elige 1 opcion como minimo</span>
                        <?
                    }elseif (selecciona('check')){
                        ?>
                            <span>------>Elige menos de 3 opciones</span>
                        <?
                    }
                ?>
            </p>
            <p>
        <!--Telefono--------------------------------------->
            <p>
                <!--Mantiene el texto introducido--------------------------------------->
                <label for="telefono">Nº de telefono</label>
                <input type="number" name = "telefono" min="100000000" max="999999999" id="idTelef" placeholder ="666666666"  value="<?php
                    if(enviado() && !vacio("telefono") && $_REQUEST["telefono"] ){
                        echo $_REQUEST["telefono"];
                    }
                ?>">
                <!--Comprueba que este vacio--------------------------------------->
                <?php
                    if(enviado() && vacio("telefono")){
                        ?>
                            <span>------>Debe introducir su telefono</span> 
                        <?php
                    }
                ?>

            </p>
            <!--Email--------------------------------------->
            <p><b>Email:</b>
                <input type="text" name = "email" id="idEmail" placeholder ="----@----.com" value="<?php
                    if(enviado() && !vacio("email") && $_REQUEST["email"]){
                        echo $_REQUEST["email"];
                    }
                ?>">
                <!--Comprueba que este vacio--------------------------------------->
                <?php
                    if(enviado() && vacio("email")){
                        ?>
                            <span>------>Debe introducir su email</span> 
                        <?php
                    }
                ?>

            </p>
            <!--Contraseña--------------------------------------->
            <p><b>Contraseña</b>
            <!--Mantiene el texto introducido--------------------------------------->
                <input type="password" name = "contraseña" id="idPass"value="<?php if(enviado()&&!vacio("contraseña")){
                    echo $_REQUEST["contraseña"];
                }?>">
                <!--Comprueba que este vacio--------------------------------------->
                <?php
                    if(enviado() && vacio("contraseña")){
                        ?>
                            <span>------>Debe introducir su contraseña</span> 
                        <?php
                    }
                ?>
            </p>
            <!--Archivo--------------------------------------->
            <p>
                <!-- SUBIR ARCHIVO -->
                <label for="idSubir">Subir documento</label>
                <input type="file" name="archivo" id="idSubir">
                
            </p>
            <!--Enviar--------------------------------------->
            <p>
                <input type="submit" value= "Enviar" name ="enviado">
            </p>
        </form>
        <?php
    }
        ?>
    </div>
    

    <a href="/">Volver al Inicio</a>
    <footer><a href="verPag.php">Ver Código</a></footer>
</body>
</html>