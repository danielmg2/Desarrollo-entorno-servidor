<?php
require_once("./alumno.php");
require_once("./Abstracta.php");
require_once("./AbsH1.php");
require_once("./AbsH2.php");
$a = new Alumno('maria',20,'maria@gmail.com','DAW2');
echo $a;
$a->darbaja();



?>