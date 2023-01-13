<?php
    require("./validaFormulario.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="./formularios.php" method ="post" enctype="multipart/form-data">
        <p><b>Inicio de sesión</b>
            <label for="idNombre">Nombre</label>
            <input type = "text" name = "nombre" id = "idnombre" placeholder="Nombre" 
            value = "<?
                if(enviado()&& !vacio("nombre")){
                    echo $_REQUEST["nombre"];
                }
            ?>">
            
        </p>
        <?
            //Comprobar que no este vacio
            if(vacio("nombre") && enviado()) {
                ?>
                <span>Debe rellenar el nombre</span>
                <?   
            }

        ?>
        <p>
            <label for="idPass"><b>Contraseña</b></label>
            <input type="password"  name="pass" id="IdPass">
        </p>
        <p><b>Genero</b>
            <label for="">Masculino</label>
            <input type="radio" name="genero" id="idMasculino" value="Masculino"
            
            <?php
                if(enviado() && existe("genero") && $_REQUEST["genero"] == "Masculino"){
                    echo "checked";
                }
            ?>
            >
            
            <label for="">Femenino</label>
            <input type="radio" name="genero" id="idFemenino" value="Femenino"
            <?php
                if(enviado() && existe("genero") && $_REQUEST["genero"] == "Femenino"){
                    echo "checked";
                }
            ?>
            >
            <?php
                if(enviado() && !existe("genero")){
                    ?>
                        <span>No existe genero</span>
                    <?php
                    
                }
            ?>
            

        </p>
        <p><b>Asignaturas:</b>
            <label for="IdDWES">Desarrollo Web Entorno Servidor</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWES" value="DWES">

            <label for="IdDWEC">Desarrollo Web Entorno Servidor</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWEC" value="DWEC">
        </p>
        
        <p><b>Curso</b>
            <select name="curso" id="idCurso">
                <option value="0">Selecciona una opción</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
            </select>
        </p>

        <input type="file" name = "fichero" id="idFichero">
        <!-- <input type="file" name = "fichero" id="idFichero"> -->
        <br>
        
        <input type="submit" value="Enviar" name = "enviado">
    </form>
</body>
</html>