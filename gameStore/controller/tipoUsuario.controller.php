<?php
require_once 'modelo/TipoUsuarioDAO.php';

class TipoUsuarioController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new TipoUsuarioDAO();
    }

   
    public function Index(){
     $tipoUsu = new TipoUsuarioDAO();
        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/tipoUsuario/tipo_usuario.php';
        require_once 'vista/layout/layout_footer_1.php';
    }

    public function Crud(){
        
        $key = "tipoUsuarioKey";
      
        $tip = new TipoUsuarioDAO();

        if(isset($_REQUEST['tipoUsuarioKey'])){
            $tip = $this->model->read($_REQUEST['tipoUsuarioKey'],$key);
        }
        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/tipoUsuario/tipo_usuario_editar.php';
        require_once 'vista/layout/layout_footer_1.php';
    }

    public function Nuevo(){
        $tip = new TipoUsuarioDAO();

        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/tipoUsuario/tipo_usuario_nuevo.php';
        require_once 'vista/layout/layout_footer_1.php';
    }

    public function Guardar(){
        $tip = new TipoUsuarioDAO();
        $tip->nombre = $_REQUEST['nombre'];
        $tip->descripcion = $_REQUEST['descripcion'];
    

        $this->model->insert($tip);

        header('Location: index.php?c=tipoUsuario');
    }

    public function reporte(){
         require_once 'reportes/pdf/lista.php';
    }

    public function Editar(){
        $tip = new TipoUsuarioDAO();

         $tip->tipoUsuariKey = $_REQUEST['tipoUsuariokey'];
        $tip->nombre = $_REQUEST['nombre'];
        $tip->descripcion = $_REQUEST['descripcion'];
    

        $this->model->update($tip);

        header('Location: index.php?c=tipoUsuario');
    }

    public function Eliminar(){
        $this->model->delete($_REQUEST['tipoUsuarioKey']);
        echo 'valor key'.$_REQUEST['tipoUsuarioKey'];
        header('Location: index.php?c=tipoUsuario');
    }
}