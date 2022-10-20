<?
function saludo(){
    echo "Hola";
}


function saludo2($nombre){
    echo "Hola ".$nombre;
}

//Parametros de tipos de datos normales 
//Pasan por valor
//con un parametro


function saludo3($nombre,){
    $nombre = $nombre."valor";
    echo "Hola ".$nombre;
}

function saludo4(){
    global $nombre;
    $nombre = $nombre."Valor";
    echo "Hola ".$nombre;
}

// function saludo5($nombre){
//     $nombre = $nombre."Valor";
//     return "Hola ".$nombre;
// }

//Por referencia
function saludo6(&$nombre){
    
    $nombre = $nombre."Valor";
    echo "Hola ".$nombre;
}

//Para pasar por referencia se usa &

//Funcion que si no le pasamos nada usa valores por defecto
function saludo7($nombre = "Mundo"){

}
function rellenaArray(&$array){
    array_push($array, date("h:i:s"));
    print_r($array);
}

function cambioLado($objeto, $lado){
    $objeto -> lado = $lado;
    
}




?>