<?

class Producto{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagen;

    public function __construct($id,$nombre,$descripcion,$precio,$stock,$imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;        
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagen = $imagen;
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