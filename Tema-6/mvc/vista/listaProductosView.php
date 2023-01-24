<table border='1'>
    <thead>
        <th>Cod.producto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Borrar</th>
    </thead>
    <tbody>
        <?php
        foreach ($lista as $value) {
            echo "<tr>";
            echo "<td>".$value->codProd."</td>";
            echo "<td>".$value->codProd."</td>";
            echo "<td>".$value->codProd."</td>";
            echo "<td>".$value->codProd."</td>";
            echo "<td>".$value->codProd."</td>";
            echo "<form action ='./index.php'>";
            echo "<input type='hidden' name='codProd' value=".$value->codProd." >";
            echo "<td><input type='submit' name='ver' value='ver' ></td>";
            echo "<td><input type='submit' name='editar' value='editar' ></td>";
            echo "<td><input type='submit' name='borrar' value='borrar' ></td>";
            echo "</form>";
            echo "</tr>";
        }
        
        ?>
    </tbody>
</table>
<?php
echo "<form action='./index.php'>";
echo "<td><input type='submit' name='nuevo' value='nuevo' ></td>";
echo "</form>";
?>