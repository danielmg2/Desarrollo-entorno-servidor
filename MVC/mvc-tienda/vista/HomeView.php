
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?
            foreach ($arrayProductos as $producto) {
            ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="card-img-top" src='./webroot/imagenes/<? echo $producto->imagen ?>' alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><? echo $producto->nombre ?></h5>
                            <p class="card-text"><? echo substr($producto->descripcion, 0, 20); ?>...</p>
                            <form>
                                <input type='hidden' name='codProd' value='<? echo $producto->codProd ?>'>
                                <input type='submit' href="./index.php" class="btn btn-primary" value='Ver' name='ver'>
                            </form>
                        </div>
                    </div>
                </div>
            <?
            }
            ?>
        </div>
    </div>
</div>