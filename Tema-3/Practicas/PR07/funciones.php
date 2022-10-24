<?php
    //Función que pinta un br
    function br(){
        echo"<br>";
    }

    //Funcion que pinta la cadena entre dos h1
    function h1($cadena){
        echo"<h1>".$cadena."</h1>";
    }

    //Función que pinta la cadena entre dos parrafos
    function p($cadena){
        echo"<p>".$cadena."</p>";
    }

    //Función que devuelve el fichero actual
    function sel(){
        echo "<br>".__FILE__;
    }



    //Función que pide un dni y devuelve la letra
    function letraDni($dni){
        $letras = array("","");
        //Numero del dni /23 sin decimales, el resto de la division es el índice de la letra

    }

?>