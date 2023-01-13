<?php
function productoVisto($id){
    //Si no existe ninguna cookie creamos [0]
    if(!isset($_COOKIE['visto'])){
        setcookie('visto[0]',$id);
    }else{
        //El array como maximo va a tener 3
        //Si existe en el array
        $array = $_COOKIE['visto'];
        if(in_array($id,$array)){
            $key = array_search($id,$array);
            unset($array[$key]);
            array_push($array,$id);
        }else{
            //Si ya tiene 3 y no existe en el array
            if(count($array)==3){
                unset($array[0]);
            }
            array_push($array,$id);
        }
        actualizar($array);
    }
    
    //guardamos en un array los productos vistos
    print_r($_COOKIE['visto']);
    

}

function actualizar($array){
    $cont =0;
    foreach($array as $id){
        setcookie('visto['.$cont.']',$id);
        $cont++;
    }
}


function mostrarUltimos(){
    
    if(isset($_COOKIE['visto'])){
        $array=$_COOKIE['visto'];
        array_reverse($array);
        foreach($array as $id){
            $producto = findById($id);
            $producto = $producto[0];
            echo '<article  class="card">';
            echo '<a href="./verProducto.php?producto='.$producto['alta'].'"';
            echo '<h2>'.$producto['nombre'].'</h2>';
            
            echo '</article>';
            
        }
    }
    
    



}
?>