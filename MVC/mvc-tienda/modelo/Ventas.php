<?

class Ventas{
    private $id;
    private $usuario;
    private $fecha;
    private $cod_producto;
    private $cantidad;
    private $precio_total;
    

    public function __construct($id,$usuario,$fecha,$cod_producto,$cantidad,$precio_total)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->cod_producto = $cod_producto;
        $this->cantidad = $cantidad;
        $this->precio_total = $precio_total;
        
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