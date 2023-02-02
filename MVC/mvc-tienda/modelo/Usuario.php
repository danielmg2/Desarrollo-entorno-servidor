<?

class Usuario{
    private $usuario;
    private $contraseña;
    private $email;
    private $fecha;

    public function __construct($usuario,$contraseña,$email,$fecha)
    {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
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