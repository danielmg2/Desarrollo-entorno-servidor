<?

//Si se pulsa el boton de leer fichero redirige a leer.php
    if(isset($_REQUEST['leido'])){
        header('Location: ./leer.php?fichero='.$_REQUEST['fichero']);
        exit();
        
    }
    
//Si se pulsa el boton de editar fichero redirige a editar.php
    if(isset($_REQUEST['editado'])){
        header('Location: ./editar.php?fichero='.$_REQUEST['fichero']);
        exit();
        
    }
    

    //Si se modifica en el fichero editar.php entonces sobreescribe todo el archivo
    if(isset($_REQUEST['modificado'])){

        //coger el request del textarea y sobreescribir en el fichero, despues hacer header Location a leer.php.
        $texto=$_REQUEST['texto'];
        
        if(!$fp = fopen($_REQUEST['fichero'],"w")){
            echo "<br>Ha habido un error al abrir el archivo";
        }else{
            fwrite($fp,$texto);
            header('Location: ./leer.php?fichero='.$_REQUEST['fichero']);
        }
        fclose($fp);
        
        exit();    
    }
?>