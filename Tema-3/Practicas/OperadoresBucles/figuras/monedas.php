<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Monedas</title>
</head>
<body>
    <?php
        $precio= $_GET["precio"];
        $pago = $_GET["pago"];
        echo $precio;
        echo "<br>";
        echo $pago;
        echo "<br>";
        $dos=2;
        $uno=1;
        $cinc=0.50;
        $vein=0.20;
        $diez=0.10;
        $cinco=0.05;
        $dos=0.02;
        $uno=0.01;

        $cont2=0;
        $cont1=0;
        $cont50=0;
        $cont20=0;
        $cont10=0;
        $cont5=0;
        $cont2=0;
        $cont1=0;



        $vuelta = $pago-$precio;
        echo $vuelta;
        while($vuelta!=0){
            while($vuelta>=$dos){
                $vuelta-=$dos;
                $cont2++;
            }
            while($vuelta>=$uno){
                $vuelta-=$uno;
                $cont1++;
            }
            while($vuelta>=$cinc){
                $vuelta-=$cinc;
                $cont50++;
            }
            while($vuelta>=$vein){
                $vuelta-=$vein;
                $cont20++;
            }
            while($vuelta>=$diez){
                $vuelta-=$diez;
                $cont10++;
            }
            while($vuelta>=$cinco){
                $vuelta-=$cinco;
                $cont5++;
            }
            while($vuelta>=$dos){
                $vuelta-=$dos;
                $cont2++;
            }
            while($vuelta>=$uno){
                $vuelta-=$uno;
                $cont1++;
            }
        }
        echo "La vuelta seria ".$cont2." Monedas de 2, ".$cont1." Monedas de 1, "
        .$cont50." monedas de 0,50 ".$cont20." Monedas de 0.20 ".$cont10." Monedas de 0.10 "
        .$cont5." monedas de 0.05 ".$cont2." monedas de 0.02 ".$cont1."monedas de 0.01 ";
    ?>
</body>
</html>