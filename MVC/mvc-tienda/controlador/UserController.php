<?

if(isset($_REQUEST['editar'])){
    $_SESSION['accion'] = 'editar';
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    // $rol = RolDAO::buscaRol($_SESSION['user']);
}elseif(isset($_REQUEST['guardar'])){
    //funcion validaContraseñas
    $_SESSION['accion'] = 'ver';
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    $usuario->usuario = $_REQUEST['user'];
    $usuario->contraseña = $_REQUEST['pass'];
    $usuario->email = $_REQUEST['email'];
    $usuario->fecha = $_REQUEST['fecha'];
    
    // $usuario->perfil = $_REQUEST['perfil'];
    // $rol->rol=$_REQUEST['perfil'];
    if(!UsuarioDAO::update($usuario)){
        $_SESSION['accion'] = 'editar';
        $_SESSION['error'] = "No se ha podido modificar";
    }
}
else{
    $usuario = UsuarioDAO::findById($_SESSION['user']);
    // $rol = RolDAO::buscaRol($_SESSION['user']);
    $_SESSION['pagina'] = 'vista';
    $_SESSION['vista'] = $vistas['user'];
}
