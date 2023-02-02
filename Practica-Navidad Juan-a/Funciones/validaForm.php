<?
function vacio($valor){
    if(empty($_REQUEST[$valor])){
       
        return true;
    }
    return false;
}

function modificado(){
    if(isset($_REQUEST['modificar'])){
        return true;
    }
    return false;
}
function insertado(){
    if(isset($_REQUEST['insertar'])){
        return true;
    }
    return false;
}

function decimal(){
    // echo gettype($_REQUEST['precio']);
   return preg_match('/^\d?\d[.]\d\d$/',$_REQUEST['precio']);
   
}
function validaFecha(){
     return preg_match('/^[1-2][0]\d\d-((11)?(12)?(10)?(0)?[1-9]?)-((31)?(30)?([0-2][0-9])?)$/',$_REQUEST['fecha']);
}

 function validaContraseña($contraseña){
    return preg_match('/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$)).{0,20}$/',$_REQUEST[$contraseña]);
}

function validaEmail($correo){
    return preg_match('/^(.+\@.+\..+)$/',$_REQUEST[$correo]);
}

function validaImagen($img){
    return preg_match('/^.*\.(jpg)$/',$_REQUEST[$img]);
}









//FUNCIONAN
//Valida los valores al modificar el producto
function validaModProducto(){
    if(modificado()){
        if(!vacio("nombre")){
            if(!vacio("descripcion")){
                if((!vacio("precio"))&&(decimal())){
                    if(!vacio("imagen")&&(validaImagen("imagen"))){
                        return true;
                    }
                }  
            }   
        }
    }
    
    return false;
}

//Valida los valores al insertar el producto
function validaInsProducto(){
    if(insertado()){
        if(!vacio("nombre")){
            if(!vacio("descripcion")){
                if((!vacio("precio"))&&(decimal())){
                    if(!vacio("imagen")&&(validaImagen("imagen"))){
                        return true;
                    }
                }   
            }   
        }
    }
    
    return false;
}



//MODIFICACION E INSERCION DE VENTAS FUNCIONAN
//Valida los valores al modificar la venta
function validaModVenta(){
    if(modificado()){
        if(!vacio("usuario")){
            if((!vacio("fecha"))&&(validaFecha())){
                if((!vacio("cantidad"))){
                    if((!vacio("precio"))&&(decimal())){
                        return true;
                    }
                } 
            }
        }
    }
    
    return false;
}

//Valida los valores al insertar la venta
function validaInsVenta(){
    if(insertado()){
        if(!vacio("usuario")){
            if((!vacio("fecha"))&&(validaFecha())){
                if((!vacio("cantidad"))){
                    if((!vacio("precio"))&&(decimal())){
                        return true;
                    }
                } 
            }
        }
    }
    return false;
}



//VALIDACION DE LOS ALBARANANES FUNCIONA
//Valida los valores al modificar Albaran
function validaModAlbaran(){
    if(modificado()){
        if((!vacio("fecha"))&&(validaFecha())){
            if((!vacio("cantidad"))){
                if(!vacio("usuario")){
                    return true;
                }
            } 
        } 
    }
    return false;
}


//Valida los valores al insertar Albaran
function validaInsAlbaran(){
    if(insertado()){
        if((!vacio("fecha"))&&(validaFecha())){
            if((!vacio("cantidad"))){
                if(!vacio("usuario")){
                    return true;
                }
            } 
        } 
    }
    return false;
}


function nuevoUSR(){
    if(isset($_REQUEST['nUsuario'])){
        return true;
    }
    return false;
}
function editaUSR(){
    if(isset($_REQUEST['eUsuario'])){
        return true;
    }
    return false;
}

function iguales(){
    
    if($_REQUEST["contrasena"]==$_REQUEST["confirmacionC"]){
       
        return true;
    }
    
    return false;
   
}



function validaNuevoUsr(){
   

    //Si vengo de nuevo usr
    if(nuevoUSR()){
        //si he metido el nombre
        if((!vacio("nombre"))){
            //si he metido la contraseña, su confirmación y las 2 son iguales
            if((!vacio("contrasena"))&&(!vacio("confirmacionC"))){
                 if(validaContraseña("contrasena")){
                    if(iguales()){
                        //Si he metido email y es correcta la sintaxis
                        if((!vacio("email"))&&(validaEmail("email"))){
                            if((!vacio("fecha"))&&(validaFecha())){
                               return true;
                           }            
                          
                       }
                    }
                 }
               
            } 
          
        }
        
    }
   
}


function validaEditaUsr(){
    //Si vengo de nuevo usr
    if(editaUSR()){
          //si he metido el nombre
        if((!vacio("nombre"))){
            //si he metido la contraseña, su confirmación y las 2 son iguales
            if((!vacio("contrasena"))&&(!vacio("confirmacionC"))){
                 if(validaContraseña("contrasena")){
                    if(iguales()){
                        //Si he metido email y es correcta la sintaxis
                        if((!vacio("email"))&&(validaEmail("email"))){
                            if((!vacio("fecha"))&&(validaFecha())){
                           return true;
                            
                           }            
                          
                       }
                    }
                 }
               
            } 
          
        }
    }
}



// //Si he metido fecha y es correcta la sintaxis
// if((!vacio("fecha"))&&(validaFecha())){
//     echo "BIEN";
// }