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

?>