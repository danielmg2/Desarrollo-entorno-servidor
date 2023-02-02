<?php
session_start();
require ('../Funciones/funcionesBD.php');
require ('../seguro/conexionBD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
    <!-- <link rel="stylesheet" href="../css/estilos.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Ventas</title>
</head>
<body>
<header class="bg-dark">
    <div class="container-fluid">
        <div class="row " >
            <div class="col-3 mt-4 ps-4 pb-3">
                <img src="../imagenes/logo4.png" alt="" width="100" heigth="100">
           </div>
            <div class="col-6 mt-4 ps-5 pt-4 text-center">
                
                <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" fill="currentColor" class="bi bi-search ms-2 mt-1 text-light" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                </div>



            </div>
            <div id="recuadro" class="col-3 mt-4 pt-4 text-end ">
                <?php
                    if($_SESSION==null){
                        ?>
                        <a href="./paginas/login.php">Iniciar Sesión</a><br>
                        
                        <a href="./paginas/nuevoUSR.php">Nuevo Usuario</a><br>
                        <?php    
                    }else{
                        ?>
                        <a class="pe-4" href="./editarUSR.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle text-light" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                                    </svg></a>
                        <?php        
                    }  
                ?>     
                <a href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left text-light" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                        </svg></a>
            </div>
        </div>       
        <nav class="navbar navbar-expand-lg navbar-light  ">
             <div class="container-fluid">
                <button class="navbar-toggler bg-light mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-start" id="navbarNavAltMarkup">
                     <div class="navbar-nav">
                         <a class="nav-link text-light" href="../index.php">Productos</a>
                         <a class="nav-link text-light" href="./albaranes.php">Albaranes</a>    
                     </div>
                 </div>
             </div>
        </nav>  
    </div>
    </header>
    <main id="mainTablas">
        
        <div class="container-fluid">
            <?php
            leeVentas();
            if($_SESSION['perfil']=="administrador"){
                ?>
                <div class="text-end">
                    <p>
                        <form id="formInsertar"action="../Funciones/redireccion.php"  method ="post" enctype="multipart/form-data">  
                            <input type="hidden" name="tabla" value="ventas">
                            <label for="editar">Nuevo registro:</label>
                            <input type="submit" value="Insertar" name="insertar">
                        </form>
                    </p>
                </div>
                
                <?php
            }
            ?>
        </div>
    </main>
    <!-- <a href="../"><img src="../imagenes/icons8-flecha-izquierda-larga-50.png" alt=""></a> -->
     
</body>
</html>