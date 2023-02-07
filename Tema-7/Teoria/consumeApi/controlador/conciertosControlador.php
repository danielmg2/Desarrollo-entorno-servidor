<?
require '../peticiones/curl.php';
if(isset($_REQUEST['accion'])){
    if($_REQUEST['accion']=='listar'){
        $lista = get();
        $lista= json_decode($lista,true);
        require '../vista/listar.php';
    }

    if($_REQUEST['accion']=='guardar'){
        //Funcion comprobar formulario
        if(post($_REQUEST['grupo'],$_REQUEST['fecha'],$_REQUEST['precio'],$_REQUEST['lugar'])){
            $lista = get();
            require '../vista/listar.php';
        }else{
            require '../vista/forminsertar.php';
        }    
    }   



    if($_REQUEST['accion']=='modificar'){
        //Funcion comprobar formulario
        if(put($_REQUEST['grupo'],$_REQUEST['fecha'],$_REQUEST['precio'],$_REQUEST['lugar'])){
            $lista = get();
            require '../vista/listar.php';
        }else{
            require '../vista/formmod.php';
        }    
    }   
}    

?>