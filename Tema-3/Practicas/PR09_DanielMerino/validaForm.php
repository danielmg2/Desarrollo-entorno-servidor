<?
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function vacioFich($nombre){
    if(empty($_FILES[$nombre])){
        return true;
    }
    return false;
}

function enviado(){
    if(isset($_REQUEST['enviado'])){
        return true;
    }
    return false;
}

function existe($nombre){
    if(isset($_REQUEST[$nombre])){
        return true;
    }
    return false;
}


function validarUsuario($nombre) {
    return preg_match("/^[aA-zZ]{3,29}$/", $nombre);
}

function validarApellidos($apellidos) {
    return preg_match('/^([aA-zZ]{3,29}\s[aA-zZ]{3,29})$/', $apellidos);
}
function validarContraseña($contraseña){
    return preg_match('/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$)).{0,20}$/',$contraseña);
}

function validarFecha($fecha){
    return preg_match('/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/', $fecha);

}

function validarDni($dni){
    return preg_match('//', $dni);

}
function validarCorreo($correo){
    return preg_match('/^(.+\@.+\..+)$/',$correo);
}


function validarFichero($fichero){
    $patron='/^.*\.(jpg|png|bmp)$/';
    
    if(preg_match($patron,$fichero)){
        $ubi="./imagenes/".$_FILES['fich']['name'];
        if (move_uploaded_file($_FILES['fich']['tmp_name'], $ubi)) {
            echo "Se movió el fichero a ". $ubi;
        }else {
            echo "Error";
        }

        return true;
    }else{
        return false;
    }
}
?>