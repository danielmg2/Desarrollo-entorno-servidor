<h2>Piramide de asteriscos</h2>
<?
$filas=5;
$asterisco=1;
$espacio=$filas*2;
for($i=0; $i<$filas;$i++)
{
    //espacios
    for($f=0;$f<=$espacio;$f++)
    {
        echo("&nbsp;");
    }
    //Asteriscos izquierda
    for($g=0;$g<$asterisco;$g++)
    {
        echo("*");
    }

   
    $asterisco+=2;
    $espacio-=2;
    echo "<br>";
}

?>