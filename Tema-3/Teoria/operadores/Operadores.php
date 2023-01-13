<h1>Operadores</h1>
<h2>Asignación</h2>
<?
    echo "=";
    echo "</br>";
    echo "+=";
    echo "</br>";
    echo "-=";
    echo "</br>";
    echo "*=";
    echo "</br>";
    echo "/=";
    echo "</br>";
    echo "%=";
    echo "</br>";
    echo ".=";
?>
<h2>Aritmeticos</h2>
<?
    echo "+";
    echo "</br>";
    echo "$-$";
    echo "</br>";
    echo "*";
    echo "</br>";
    echo "/";
    echo "</br>";
    echo "%";
    echo "</br>";
    echo "-$";
?>
<h2>Comparación</h2>
<?
    echo "&&/and";
    echo "</br>";
    echo "||/or";
    echo "</br>";
    echo "xor";
    echo "</br>";
    echo "!";
    echo "</br>";
    $a=1;
    $b=2;
    echo "Nave espacial";
    echo "<=>";
    var_dump($a<=>$b);
?>

<h2>Bits</h2>
<?
    echo "&";
    $a=5;
    $b=2;
    var_dump($a & $b);
    echo "</br>";
    echo "|";
    echo "</br>";
    echo "^";
    echo "</br>";
    echo "¬";
    echo "</br>";
    echo "<<";
    echo "</br>";
    echo "Multiplica por 2(10 en binario) tantas veces como valga \$b";
    echo "</br>";
    var_dump($a << $b);
    echo "</br>";
    echo ">>";
    echo "</br>";
    echo "Multiplica por 2(10 en binario) tantas veces como valga \$b";
    echo "</br>";
    var_dump($a>>$b);
?>



<h2>Condicionales</h2>
<?
    $a=5;
    $b=2;
    switch($a)
    {
        case 1:
            echo "Es 1";
            break;
        case 2:
            echo "Es 2";
            break;
        default:
            echo "Otro";
            break;    
    }
?>
<h2>Bucles</h2>
<?
    echo "Bucle FOR";
    echo "</br>";
    for($i=0; $i<10 ; $i++)
    {
        echo $i;
    }


    echo "</br>";
    echo "Ejemplo de break";
    echo "</br>";
    for($i=0; $i<10 ; $i++)
    {
        if($i==5)
        {
            break;
        }
        echo $i;
    }
    echo "</br>";
    echo "Ejemplo de Continue";
    echo "</br>";
    for($i=0; $i<10 ; $i++)
    {
        if($i==5)
        {
            continue;
        }
        echo $i;
    }
    echo "</br>";
    echo "Bucle WHILE";
    echo "</br>";
    $a = 1;
    while($a<5)
    {
        echo $a;
        $a++;
    }
    echo "</br>";
    echo "Bucle DO WHILE";
    echo "</br>";
    $a = 1;
    do{
        echo $a;
        $a++;
    }while($a<5);

?>