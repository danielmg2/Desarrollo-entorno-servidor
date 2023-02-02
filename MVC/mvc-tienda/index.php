<?

require './config/configuracion.php';

session_start();

if (isset($_REQUEST['home'])) {
    $_SESSION['controlador'] = $controladores['home'];
    $_SESSION['pagina'] = 'home';
    $_SESSION['vista'] = $vistas['home'];
    require_once $_SESSION['controlador'];
}else if (isset($_REQUEST['logout'])) {
    session_destroy();
    header('Location: ./index.php');
    exit;

} else {

    //si no tiene una vista 
    ///guardad en la sesion va a home
    if (!isset($_SESSION['pagina'])){
        $_SESSION['controlador'] = $controladores['home'];
        $_SESSION['pagina'] = 'home';
        $_SESSION['vista'] = $vistas['home'];
        require_once $_SESSION['controlador'];
    
    //si ha pulsado login 
    }else if(isset($_REQUEST['login'])){
        $_SESSION['pagina']= 'login';
        $_SESSION['controlador'] = $controladores['login'];
        $_SESSION['vista'] = $vistas['login'];
    }else{
        require_once $_SESSION['controlador'];
    }
    
}




require_once('./vista/layout.php');