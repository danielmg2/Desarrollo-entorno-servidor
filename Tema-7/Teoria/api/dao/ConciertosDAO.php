<?

class ConciertoDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from concierto;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    
    }
    public static function findById($id){
        $sql = 'select * from concierto where id= ?';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if($obj){
            return $obj;
        }  
        return null;
    }


    public static function findByFecha($fecha){
        $sql = 'select * from concierto where fecha >= ?';
        $datos = array($fecha);
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }


    public static function findOrderByFecha($fecha){
        $sql = 'select * from concierto order by fecha '.$fecha.';';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }
    
    public static function findByFechaOrder($fecha,$orden){
        $sql = 'select * from concierto where fecha >= ? order by fecha '.$orden.';';
        $datos = array($fecha);
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }

    public static function delete($id){
        $sql = 'delete from conciertos where id= ?';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into conciertos values (?,?,?,?,?)';
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

    public static function update($obj){
        $sql = 'update concierto set grupo=?, fecha=?, precio=?, lugar=?';
        $datos = array($obj->grupo,$obj->fecha,$obj->precio,$obj->lugar);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }



    
}