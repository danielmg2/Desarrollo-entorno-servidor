<?

class ProductoDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from productos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayProductos = array();
        while($obj = $devuelve->fetchObject()){         
            $producto = new Producto($obj->id, $obj->nombre, $obj->descripcion,$obj->precio, $obj->stock,$obj->imagen);
            array_push($arrayProductos,$producto);
        }
        return $arrayProductos;

    }
    public static function findById($id){
        $sql = 'select * from productos where id = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $producto = new Producto($obj->codProd, $obj->nombre, $obj->descripcion,$obj->precio, $obj->stock,$obj->imagen);
            return $producto;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'delete from productos where id = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }

    //Puede que se tenga que quitar una interrogación
    public static function insert($objeto){
        $sql = 'insert into productos values(?,?,?,?,?)';
        $objeto = (array)$objeto;
        $datos = array();
        foreach($objeto as $att){
            array_push($datos,$att); 
        }
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function update($objeto){
        $sql = 'update productos set nombre = ?,descripcion = ?,precio = ?,stock=?,img=? where id = ? ';
        $datos = array($objeto->nombre,$objeto->descripcion,$objeto->precio,$objeto->stock,$objeto->img,$objeto->codProd);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
}