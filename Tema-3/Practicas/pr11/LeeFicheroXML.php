<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>
<body>
    <header>PR11</header>
    <?php
        if(isset($_REQUEST["Guardar"])){
            // echo $_REQUEST["nombre"];
            // echo $_REQUEST["nota1"];
            // echo $_REQUEST["nota2"];
            // echo $_REQUEST["nota3"];
            $contador=0;
            //Modificar el XML
            $dom=new DOMDocument();
            $dom->load('notas.xml');
            $nombres=$dom->getElementsByTagName('Nombre');
            foreach ($nombres as $nombre) {
                if($nombre->nodeValue==$_REQUEST["nombre"]){
                   $nombre->nextElementSibling->nodeValue=$_REQUEST["nota1"];
                   $nombre->nextElementSibling->nextElementSibling->nodeValue=$_REQUEST["nota2"];
                   $nombre->nextElementSibling->nextElementSibling->nextElementSibling->nodeValue=$_REQUEST["nota3"];
                }
            }
            if($dom->save('notas.xml')){
                echo "Todo bien";
                //Si todo se guarda, muestro la tabla de nuevo
                $fila=0;
                $dom=new DOMDocument();
                $dom->load('notas.xml');
                ?>
                <div>
                        <table>
                            <tr>
                                <td>NOMBRE</td>
                                <td>NOTA 1</td>
                                <td>NOTA 2</td>
                                <td>NOTA 3</td>
                                <td>EDITAR</td>
                            </tr>
                            
                        <?php
                
                        $raiz= $dom->childNodes[0];
                    
                        foreach($raiz->childNodes as $alumnos){
                            ?>
                            <tr>
                            <?php
                            if($alumnos->nodeType==1){
                                $fila++;
        
                            }
                            foreach ($alumnos->childNodes as $notas) {
                                    if($notas->nodeType==1){
                                    echo "<td>".$notas->nodeValue."</td>";
                                    }
                            }
        
                            if($alumnos->nodeType==1){
                                ?>
                                <td>
                                    <form action="./EditaXML.php" method ="post" enctype="multipart/form-data">
                                        <input type="hidden" name="nota" value="<?php echo $fila?>">
                                        <input type="submit" value="Editar" name="editar">
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    
                ?>
                </table>
            </div>
        <?php    
            }
            //Si es la primera vez que entra:
        }else{

            $fila=0;
            $dom=new DOMDocument();
            $dom->load('notas.xml');
            ?>
            <div>
    
                    <table>
                        <tr>
                            <td>NOMBRE</td>
                            <td>NOTA 1</td>
                            <td>NOTA 2</td>
                            <td>NOTA 3</td>
                            <td>EDITAR</td>
                        </tr>
                        
                    <?php
            
                    $raiz= $dom->childNodes[0];
                
                    foreach($raiz->childNodes as $alumnos){
                        ?>
                        <tr>
                        <?php
                        if($alumnos->nodeType==1){
                            $fila++;
    
                        }
                        foreach ($alumnos->childNodes as $notas) {
                                if($notas->nodeType==1){
                                echo "<td>".$notas->nodeValue."</td>";
                                }
                        }
    
                        if($alumnos->nodeType==1){
                            ?>
                            <td>
                                <form action="./EditaXML.php" method ="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nota" value="<?php echo $fila?>">
                                    <input type="submit" value="Editar" name="editar">
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                
            ?>
            </table>
        </div>
        <?php
        }
        ?>
</body>
</html>
