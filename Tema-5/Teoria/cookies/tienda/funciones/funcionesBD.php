<?php


//Buscar todos
function findAll(){
    try{

        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql= "select * from producto";
        $devuelve = $con->query($sql);
        $array = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        unset($con);
        return $array;
        
    }catch(Exception $ex){
        return false;
        print_r($ex);
        unset($con);
    }
}

//Buscar por Id
function findById($id){
    try{

        $con = new PDO('mysql:host='.HOST.';dbname='.BBDD,USER,PASS);
        $sql= "select * from producto where codigo = ?";
        $prepare= $con->prepare($sql);
        $devuelve = $prepare->execute(array($id));
        if($devuelve){
            $producto = $prepare->fetchAll();
            unset($con);
            return $producto;
        }else{
            unset($con);
            return false;
        }


        unset($con);
        
        
    }catch(Exception $ex){
        return false;
        print_r($ex);
        unset($con);
    }
}



?>