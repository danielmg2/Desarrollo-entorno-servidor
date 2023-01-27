<?

class Usuario{
    private $usuario;
    private $contrasena;
    private $email;
    private $fecha;

    public function __construct($usuario,$contrasena,$email,$fecha)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->fecha = $fecha;
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