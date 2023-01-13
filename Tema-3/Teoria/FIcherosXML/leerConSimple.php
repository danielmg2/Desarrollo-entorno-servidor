<?php
$mundial = simplexml_load_file('mundial.xml');


foreach ($mundial as $equipo) {
    echo "<br>Equipo: ".$equipo->children()[0];
    echo " y Entrenador: ".$equipo->children()[1];
}
$equipo=$munidal->addChild('Equipo');

?>