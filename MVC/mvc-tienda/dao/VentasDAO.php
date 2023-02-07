<?

class VentasDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from ventas;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayUsuarios = array();
        while($obj = $devuelve->fetchObject()){         
            $venta = new Ventas($obj->id, $obj->usuario, $obj->fecha,$obj->cod_producto,$obj->cantidad,$obj->precio_total);
            array_push($arrayUsuarios,$venta);
        }
        return $arrayUsuarios;

    }
    public static function findById($id){
        $sql = 'select * from ventas where id = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $usuario = new Usuario($obj->usuario, $obj->contraseña, $obj->email,$obj->fecha);
            return $usuario;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'delete from usuarios where usuario = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into usuarios values(?,?,?,?)';
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
        $sql = 'update usuarios set usuario = ?, contraseña = ?, email = ?, fecha=? where usuario = ? ';
        $datos = array($objeto->usuario,$objeto->contraseña,$objeto->email,$objeto->fecha,$_SESSION['nombre']);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }

    public static function valida($user,$pass){
        $sql = 'select * from usuarios where usuario = ? and contraseña = ?;';
        // CIFRAR CONTRASEÑAS Y CAMBIAR $passh = sha1($pass);
        $passh = ($pass);
        $datos = array($user,$passh);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();

        // $sql2= 'select rol from roles where usuario = ?;';
        // $datos2 = array($user);
        // $devuelve2 = parent::ejecuta($sql2,$datos2);
        // $obj2 = $devuelve2->fetchObject();
        if($obj){
             $usuario = new Usuario($obj->usuario, $obj->contraseña,$obj->email,$obj->fecha);
            return $usuario;
        }else{
            return null;
        }
    }
}