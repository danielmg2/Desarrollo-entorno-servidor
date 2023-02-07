
<?
if (isset($_REQUEST['registro'])) {
    $_SESSION['controlador'] = $controladores['registro'];
    $_SESSION['vista'] = $vistas['registro'];
} else {
    if (isset($_REQUEST['user'])) {
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        if (empty($user)) {
            $_SESSION['error'] = "Debe rellenar el nombre";
        } elseif (empty($pass)) {
            $_SESSION['error'] = "Debe rellenar la contraseña";
        } else {


            $usuario = UsuarioDAO::valida($user, $pass);
            $rol = RolDAO::buscaRol($user);
            if (($usuario != null)&&($rol != null)) {
                $_SESSION['validado'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['nombre'] = $usuario->usuario;
                $_SESSION['perfil'] = $rol->rol;
                $_SESSION['vista'] = $vistas['home'];
                $_SESSION['controlador'] = $controladores['home'];
                $_SESSION['pagina'] = 'home';     
                require  $_SESSION['controlador'];
            }
        }
    }
}
