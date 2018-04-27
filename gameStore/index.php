
<?php
session_start(); 

//Se incluye la configuración de conexión a datos en el
//SGBD: MariaDB.
require_once 'configuracion/Database.php';

//Para registrar productos es necesario iniciar los proveedores
//de los mismos, por ello la variable controller para este
//ejercicio se inicia con el '´pantallaPrincipal'.
$controller = 'login';

// Todo esta lógica hara el papel de un FrontController
if (!isset($_REQUEST['c'])) {
    //Llamado de la página principal

    /* Contrusccion de la ruta de la clase controlador */
    require_once "controller/$controller.controller.php";
    /* Contruccion de la clase controlador */
    $controller = ucwords($controller) . 'Controller';
    /* Instancia de la clase controlador */
    $controller = new $controller;
   
    /* Accede al metodo Index para mostrar la pagina principal */
    $controller->Index();
} else {
    
        // Obtiene el controlador a cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
//        echo $controller;    
//         echo "<script>
//	        alert('".$_SESSION['loggedin']."');
//		  </script>";
             
if (isset($_SESSION['loggedin']) && 
          $_SESSION['loggedin'] == true || 
          ($controller == "usuario" && 
          $accion == "Registro" || $accion == "GuardarRegistro")|| 
          ($controller == 'login' && $accion =='Login' )) {

        // Instancia el controlador
        require_once "controller/$controller.controller.php";
        //combierte la primera letra de una cadena en mayuscula
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
        } else {

            require_once 'vista/layout/layout_header.php';
            require_once 'vista/usuario_denegado.php';
            require_once 'vista/layout/layout_footer.php';

        exit;
    }
}
