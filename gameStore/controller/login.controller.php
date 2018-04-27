<?php

require_once 'modelo/Login.php';

/**
 * Description of login
 *
 * @author Jonathan Antonio Cruz Araiza
 */
class loginController {

    //put your code here
    private $model;

    function __construct() {
        $this->model = new Login();
    }

    //Llamado plantilla principal
    public function Index() {
        //$this->model->login();
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/login.php';
        require_once 'vista/layout/layout_footer.php';
    }

    public function cerrarSesion() {
        $log = new Login();
        $this->model->logout();
    }

    public function usuarioDenegado() {
        
    }
    public function Login(){
        $log = new Login();
        $log->setUsuario($_REQUEST['correo']);
        $log->setPassword($_REQUEST['password']);
   
        $this->model->login($log); 
        
    }
}
