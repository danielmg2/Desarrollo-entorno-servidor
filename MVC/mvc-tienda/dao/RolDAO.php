<?

class RolDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from roles;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayRol = array();
        while($obj = $devuelve->fetchObject()){         
            $rol = new Rol($obj->rol,$obj->usuario);
            array_push($arrayRol,$rol);
        }
        return $arrayRol;

    }
    public static function findById($usuario){
        $sql = 'select * from roles where usuario = ?;';
        $datos = array($usuario);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $rol = new Rol($obj->rol,$obj->usuario);
            return $rol;
        }  
        return null;
    }

    public static function delete($usuario){
        $sql = 'delete from roles where usuario = ?;';
        $datos = array($usuario);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }

    public static function insert($objeto){
        $sql = 'insert into roles values(?,?)';
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
        $sql = 'update roles set rol = ? where usuario = ? ';
        $datos = array($objeto->rol,$objeto->usuario);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }

    public static function buscaRol($user){
        $sql = 'select rol from roles where usuario = ?;';
        // CIFRAR CONTRASEÑAS Y CAMBIAR $passh = sha1($pass);
        
        $datos = array($user);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();

        if($obj){
             $rol = new Rol($obj->rol,$user);
            return $rol;
        }else{
            return null;
        }
    }
}