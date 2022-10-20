<h1>Funciones</h1>

<?
    include("./funciones.php");


    //Saludo1
    saludo();
    echo "<br>";
    saludo2("Daniel");
    echo "<br>";
    $nombre = "Maria";
    echo "<br>";
    saludo3($nombre);
    echo "<br>Cambio de nombre:".$nombre;



    //Variable global
    echo "<br>";
    echo "Usando la global";
    echo "<br>";
    saludo4();
    echo "<br>Cambio de nombre".$nombre;

    //que devuelva return
    echo "<br>";
    echo "Usando return";
    echo "<br>";
    // $nombre = saludo5();
    echo "Cambio de nombre".$nombre;
    //por referencia
    saludo6($nombre);



    //Valor opcional
    echo"<br>";
    echo "Usando valores por defecto";
    echo"<br>";
    saludo7();
    saludo7("Hola");



    //pasar un array
    $array = array();
    rellenaArray($array);
    print_r($array);
    //LLamada que rellene array con la hora de la llamada
    //Los arrays se pasan por valor



    //OBJETOS

    class cuadrado{
        public $lado = 5;
    }

    $objeto = new Cuadrado();
    cambioLado($objeto,6);
    echo "<br>Objeto: ".$objeto->lado;


    

?>