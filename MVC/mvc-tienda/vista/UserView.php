<br>
<?
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<form action="./index.php" method="post">
    <label for="user">Usuario</label>
    <input type="text" name="user" id="user" value=<? echo $usuario->usuario ?>>
    <?
    if ($_SESSION['accion'] == 'editar') { ?>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
        <label for="pass"> Repite Contraseña</label>
        <input type="password" name="pass1" id="pass1">
    <?
    }
    ?>
    <br><label for="pass">Email</label>
    <input type="text" name="email" id="email" value=<? echo $usuario->email ?>>
    <br><label for="pass">Fecha</label>

    <input type="text" name="fecha" id="fecha" value=<? echo $usuario->fecha ?>>
    
    <!-- <br><label for="pass">Perfil</label>
    <input type="text" name="perfil" id="perfil" value=<? //echo $rol->rol?>> -->
    <?
    if ($_SESSION['accion'] == 'editar') { ?>
        <input type="submit" value="Guardar" name="guardar">
    <?
    } else {
    ?>
        <input type="submit" value="Editar" name="editar">
    <?
    }
    ?>
</form>