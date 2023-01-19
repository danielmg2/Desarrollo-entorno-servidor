<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
<?php
if(!estaValidado()){
    ?>
    <input type="submit" name="login">
    <?php
}else{
    ?>

    <h2><? echo $_SESSION['user'] ?></h2>
    <input type="submit" value="LogOut" name="logout">
    <?php
}
?>

<form action="">

    <input type="button" value="Login" name="Login">

</form>

</body>
</html>