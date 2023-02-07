<?

class Rol{ 
    private $rol;
    private $usuario;

    public function __construct($rol,$usuario)
    {
        $this->usuario = $usuario;
        $this->rol = $rol;
    }
    
    public function __get($get){
        if(property_exists(__CLASS__,$get))
            return $this->$get;
        return null;
    }

    public function __set($clave,$valor){
        if(property_exists(__CLASS__,$clave))
            $this->$clave=$valor;
        
    }

}