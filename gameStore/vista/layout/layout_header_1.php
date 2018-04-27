<html lang="es">
    
    <head>
        <title>GameStore</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_title ?></title>

        <link rel="stylesheet" href="media/css/miestilo.css"> 

        <link rel="stylesheet" href="media/css/bootstrap.min.css"> 
        <script src="media/js/bootstrap.min.js"></script>
        <script src="media/bootstrap.min.js"></script>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="media/js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="media/js/funciones.js" type="text/javascript"  ></script>
            </head>
          
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="?c=pantallaPrincipal&a=Index">GAMESTOR</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="?c=usuario&a=Index">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a href="../../controller/usuario.controller.php"></a>
                            <a class="nav-link" href="?c=tipoUsuario&a=Index"id="videoJuego" >Tipo Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../vista/catalogos/list_videojuegos.php">Video Juegos</a>
                        </li>
                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div style="margin:5px;padding: 5px;">
                                 
                                </div>
                            </div>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success my-2 my-sm-0"  href="?c=login&a=cerrarSesion"e>Cerrar Sesión</a>
                    </form>
                </div>
            </nav>
            <body>
                <div class="container-fluid">
                    <div class="row">
                       
                        <div class="col-12" style="margin-left: -15px;">
                            <div id="wrapper" class="toggled" style="overflow: hidden">
                                
                                <div id="page-content-wrapper" style="min-width:96%;max-width:96%;<?php if($_SESSION['menuVisible']==0){echo 'padding-top:0px;';}else{} ?>">
    <div class="container-fluid" style="margin-left:-100px;<?php  if($_SESSION['menuVisible']==1){echo "margin-left:-230px;";}else{echo 'margin-left:0px;width:87%;';} ?>">








