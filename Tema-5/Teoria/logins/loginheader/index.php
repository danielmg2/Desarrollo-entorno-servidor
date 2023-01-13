<?

if (!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic Realm="Contenido Restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "No autorizado";
}elseif($_SERVER['PHP_AUTH_USER']=='Daniel' && $_SERVER['PHP_AUTH_PW']){
    header('Location: ./paginaConPermiso.php');

}else{
    header('WWW-Authenticate: Basic Realm="Contenido Restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "No autorizado";
}

echo "Mi pagina con derecho de admision";



?>