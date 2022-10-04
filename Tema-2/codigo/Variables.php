<?php
    //include("./header.html");
    //require("./header.html");
?>
<h2>Valor y referencia</h2>
<?php
    $var=1;
    $var1 =$var;
    echo $var . "</br>";
    echo $var1 . "<br>";
    $var1 =$var1 +1;
    echo $var ."<br>";
    echo $var1 ."<br>";
    echo $var1 ."<br>";


    function cambio(){
        $global = 2;
        echo "El valor de global dentro de la funcion es ".$global;
    }

    cambio();
   // echo "<br>El valor global es ". $global;
    //Usamos la misma variable
    $global=1;
    function cambio02(){
        $local=$global;
        echo "El valor de global dentro de la funcione es ".$local;

    }
    //cambio02();
    echo "<br>El valor de global es ".$global;


    //variables de funcion:

    Function crearCoches(){
        static $numeroVecesCreada =0;
        $numeroVecesCreada = $numeroVecesCreada+1;
        echo "<br> ha sido creado un coche";
        echo "<br>LLevo Creados" . $numeroVecesCreada;
    }
    crearCoches();
    crearCoches();
    include("./constantes.php");
   // echo "<br>Al usuario ".USER. "le gusta el numero ".PI;
    //USER="pepe";
    echo "<pre>";
    var_dump($_SERVER);
    var_dump($_GET);
    var_dump($_POST);
    var_dump($_SESSION);
    echo "</pre>";


    echo time();
    echo "<br/>";
    echo date_default_timezone_get();
    date_default_timezone_set('Europe/Madrid');
    echo date_default_timezone_get();

    echo "<p>Fecha de hoy</p>";
    echo date("d m Y h:i:s O", 123456789);
    echo strtotime("now");
    echo "<br>";
    echo strtotime("2022-10-04");
    echo "<br>";
    echo "<br>";
    echo date("d m y",strtotime("2022-10-04"));



    echo "<p>Diferencia de año, mes, ida entre dos fechas</p>";
    $primera = mktime(0,0,0,10,11,1994);
    $segunda = strtotime("2022-10-04");
    $dif= $segunda - $primera;
    echo "Diferencia :".$dif;
    $anos = $dif / (60*60*24*365);
    echo "los años que han pasado" .$anos;

    $fecha1 = new DateTime("1994-10-11");
    $fecha2 = new DateTime();
    $intervalo = $fecha2->diff($fecha1);
    echo "<br>Años: ". $intervalo->y . " meses: " .$intervalo->m . " dias ". $intervalo->d;


?>