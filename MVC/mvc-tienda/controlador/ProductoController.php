<?
if(isset($_REQUEST['borrar'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::delete($_SESSION['producto']);
    $lista=ProductoDAO::findAll();
    
}
else if(isset($_REQUEST['editar'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['editarProducto'];

}else if(isset($_REQUEST['codProd'])){
    $_SESSION['producto'] = $_REQUEST['codProd'];
    $producto = ProductoDAO::findById($_SESSION['producto']);
    $_SESSION['vista'] = $vistas['verProducto'];

}elseif(isset($_REQUEST['comprar'])){
    echo "COMPRAR";

}else if(isset($_REQUEST['admProductos'])){
    $lista=ProductoDAO::findAll();
}