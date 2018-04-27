<?php
require_once 'modelo/VideoJuego.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pantallaPrincipal
 *
 * @author PC
 */
class PantallaPrincipalController {
    //put your code here
    private $model;
    function __construct() {
        $this->model = new VideoJuego();
    }

    
    //Llamado plantilla principal
    public function Index(){
        $videoJuegos = new VideoJuego();
    //session_start();
      //  $_SESSION['menuVisible'] = 1;
        require_once 'vista/layout/layout_header_1.php';
        //require_once 'vista/layout/layout_menu.php';
       // echo '<div  id="sidebar-wrapper" style="position:relative;left:280px;width:0px;"></div>';
        require_once 'vista/pantalla_principal.php';
        require_once 'vista/layout/layout_footer_1.php';
    }
}
