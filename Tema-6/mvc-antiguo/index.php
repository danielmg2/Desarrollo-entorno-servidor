<?php
require './config/configuracion.php';
// $arrayUsuarios = UsuarioDAO::findAll();
// echo "<br>";
// print_r($arrayUsuarios);


// $findId=UsuarioDAO::findById("u1");
// echo "<br>";
// echo "<br>";
// print_r($findId);

// echo "<br>";
// // $usuario = new Usuario('u5',sha1('maria'),'maria','maria@gmail.com','ADM01');
// // UsuarioDAO::insert($usuario);


// echo "<br>";
// $usuario = new Usuario('u5',sha1('maria'),'mariaaaa','mariaaaaa@gmail.com','ADM01');
// UsuarioDAO::update($usuario);


// // if(){

// // }


if(estaValidado()){

}else if(estaValidado() && !isset($_SESSION['pagina'])){

    $_SESSION['pagina']='login';
    $_SESSION['controlador']=$controladores[];
    $_SESSION['vista']=$vistas['login'];

}else if(isset($_REQUEST['pagina'])){
    require_once $_SESSION['controlador'];
}






?>