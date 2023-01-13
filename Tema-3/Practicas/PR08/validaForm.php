<?
    function vacio($nombre){
        if(empty($_REQUEST[$nombre])){
            return true;
        }
        return false;
    }

    function enviado(){
        if(isset($_REQUEST['enviado'])){
            if(file_exists($_REQUEST['ficher'])){
                header('Location: ./leer.php?fichero='.$_REQUEST['fichero']);
                exit();
            }
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