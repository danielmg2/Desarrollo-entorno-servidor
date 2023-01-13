<?php

require_once('./Persona2.php');
class alumno extends Persona{
    private $curso;
    
    public function __construct($nombre,$edad,$email,$curso){
        parent::__construct($nombre,$edad,$email);
        $this->curso=$curso;

    }
    
    
    public function __toString(){
        return "ID:".parent::$id."Nombre " . $this->nombre." Edad ".$this->edad."CURSO".$this->curso."<br>"; 
    }
}



    


?>