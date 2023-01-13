<?
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
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

?>