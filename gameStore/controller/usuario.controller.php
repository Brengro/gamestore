<?php

include_once 'modelo/UsuarioDAO.php';

/**
 * Controla los eventos que permite eliminar ,agregar,actualizar,consultar 
 *
 * @author Joanthan Antonio Cruz Araiza
 * @version 1.0
 */
class UsuarioController {

    private $model;
    private $nombre;
    private $apellido;
    private $emai;
    private $password;

    public function __CONSTRUCT() {
        $this->model = new UsuarioDAO();
    }

    public function Index() {
        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/usuario/usuario.php';
        require_once 'vista/layout/layout_footer_1.php';
    }

    public function Crud() {
        $key = "usuario_key";
        $usu = new usuario();
        $valorKey = $_REQUEST['usuarioKey'];
        if (isset($valorKey)) {
            $usu = $this->model->read($valorKey, $key);
        }
        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/usuario/usuario_editar.php';
        require_once 'vista/layout/layout_footer_1.php';
    }

    public function Nuevo() {
        $tip = new Usuario();
        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/usuario/usuario_nuevo.php';
        require_once 'vista/layout/layout_footer_1.php';
    }
    public function Registro() {
        $tip = new Usuario();
        require_once 'vista/layout/layout_header_1.php';
        require_once 'vista/catalogos/usuario/registro.php';
        require_once 'vista/layout/layout_footer_1.php';
    }
    public function Guardar() {
        $usu = new Usuario();
        $usu->setNombre($_REQUEST['nombre']);
        $usu->setApellidos($_REQUEST['apellidos']);
        $usu->setEmail($_REQUEST['email']);
        $usu->setPassword($_REQUEST['password']);


        $this->model->insert($usu);

        header('Location: index.php?c=usuario');
    }
    
     public function GuardarRegistro() {
        $usu = new Usuario();
        $usu->setNombre($_REQUEST['nombre']);
        $usu->setApellidos($_REQUEST['apellidos']);
        $usu->setEmail($_REQUEST['email']);
        $usu->setPassword($_REQUEST['password']);


        $this->model->insert($usu);

        header('Location: index.php');
    }

    public function reporte() {
        require_once 'reportes/pdf/lista.php';
    }

    public function Editar() {
         $usu = new Usuario();

        $usu->setNombre($_REQUEST['nombre']);
        $usu->setApellidos($_REQUEST['apellidos']);
        $usu->setEmail($_REQUEST['email']);
        $usu->setPassword($_REQUEST['password']);

        $this->model->update($usu);

        header('Location: index.php?c=tipoUsuario');
    }

    public function Eliminar() {
        $this->model->delete($_REQUEST['usuarioKey']);
      
        header('Location: index.php?c=usuario&a=Index');
    }

    function getModel() {
        return $this->model;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmai() {
        return  $this->emai;
    }

    function getPassword() {
        return hash($this->password);
    }

    function setModel($model) {
        $this->model = $model;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEmai($emai) {
        $this->emai = $emai;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
