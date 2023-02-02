<?

class UsuarioDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from usuarios;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayUsuarios = array();
        while($obj = $devuelve->fetchObject()){         
            $usuario = new Usuario($obj->usuario, $obj->contrasena, $obj->email,$obj->fecha);
            array_push($arrayUsuarios,$usuario);
        }
        return $arrayUsuarios;

    }
    public static function findById($id){
        $sql = 'select * from usuarios where usuario = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $usuario = new Usuario($obj->usuario, $obj->contrasena, $obj->email,$obj->fecha);
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
        $sql = 'update usuarios set contrasena = ?, email = ?, fecha=? where usuario = ? ';
        $datos = array($objeto->contrasena,$objeto->email,$objeto->fecha,$objeto->usuario);
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
        if($obj){
             $usuario = new Usuario($obj->usuario, $obj->contraseña,$obj->email,$obj->fecha);
            return $usuario;
        }else{
            return null;
        }
    }
}