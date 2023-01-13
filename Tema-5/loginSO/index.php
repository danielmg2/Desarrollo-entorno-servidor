<?php

if(!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unathorized');
    echo "No autorizado";
}elseif($_SERVER['PHP_AUTH_USER']=='daniel' && $_SERVER['PHP_AUTH_PW']){
    header('Location:./paginaconPermiso.php');

}else{
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unathorized');
    echo "No autorizado";
}
?>