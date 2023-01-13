<?
function vacio($nombre){
    if (empty($_REQUEST[$nombre])) {
        return true;
    }
    return false;
}

function enviado(){
    if (isset($_REQUEST['enviado']))
        return true;
    return false;
}

function existe($nombre){
    if (isset($_REQUEST[$nombre]))
        return true;
    return false;
}

function selecciona($nombre){
    if(isset($_REQUEST[$nombre]))
        if(count($_REQUEST[$nombre]) > 3){
            return true;
    }
    return false;
}

//Valida si todos los campos obligatorios se han enviado
function valida(){
    if (enviado()) {
        if (!vacio("nombre") && !is_numeric($_REQUEST["nombre"])) {
            if (!vacio("apellidos")) {
                if (!vacio("nacimiento")) {
                    if (existe("genero") && $_REQUEST["genero"]!=0) {
                        if (existe("check") && !selecciona("check")) {   
                            return true;
                        }
                    }
                }
            }
        }
    }
    return false;
}


//Muestra los campos del formulario al enviarlos
function muestra(){

    //Nombre Obligatorio
    echo "<p>Nombre Obligatorio: ". $_REQUEST["nombre"] . "</p>";
    //Nombre Opcional
    if(isset($_REQUEST["nombreOp"])){
        echo "<p>Nombre Opcional: ". $_REQUEST["nombreOp"] ."</p>";
    }

    //Apellido Obligatorio
    echo "<p>Apellido Obligatorio: ". $_REQUEST["apellidos"] . "</p>";
    //Apellido Opcional
    if(isset($_REQUEST["apellidosOp"])){
        echo "<p>Apellido Opcional: ". $_REQUEST["apellidosOp"] . "</p>";
    }

    //Fecha
    echo "<p>Fecha: ". $_REQUEST["nacimiento"] . "</p>";
    //Fecha Opcional
    if(isset($_REQUEST["nacimientoOp"])){
        echo "<p>Fecha opcional: ". $_REQUEST["nacimientoOp"] . "</p>";
    }

    //RadioButton
    echo "<p>Elegiste: ". $_REQUEST["genero"] . "</p>";
    
    //Cursos
    echo "<p>Seleccionaste: ". $_REQUEST["curso"] . "</p>";
    
    //Checks
    echo "<p> Elegiste: ";
        foreach($_REQUEST["check"] as $valor){
            echo "/  $valor ";
        }
    echo "</p>";
    
    //Telefono
    echo "<p>Teléfono: ". $_REQUEST["telefono"] . "</p>";
    
    //Email
    echo "<p>Email: ". $_REQUEST["email"] . "</p>";
    
    //Contraseña
    echo "<p>Contraseña: ". $_REQUEST["contraseña"] . "</p>";
    
    //Fichero
    echo "<p> Documento: ";
        echo $_FILES["archivo"]["name"];
    echo "</p>";
}
?>