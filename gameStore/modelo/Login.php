<?php

/**
 * Description of login
 *
 * @author Jonathan Antonio Cruz Araiza
 */
class Login {

    private $usuario;
    private $password;
    private $tipoUsuario;
    public $con;
    public $tabla = 'usuario';

    public function __construct() {
        $db = Database::getInstance();
        $this->con = $db->getConexion();
    }

    function readUser() {
        $query = 'SELECT email, password, tipoUsuarioKey' .
                ' FROM ' . $this->tabla ;
        $rst = $this->con->prepare($query);
         echo $query.'<br/>';
        $rst->execute();
        return $rst;
    }

    public function manterSession() {
        //session_start();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            //  header('Location:pantalla_principal.php');
            echo "<script>
	          location='?c=pantallaPrincipal&a=Index';
		  </script>";
          
        }
    }

    public function logout(){
        session_start();
        unset($SESSION['username']);
        session_destroy();
        header('Location:index.php');
    }

    public function login($usuario = NULL) {
       
             $registro = $this->readUser();
             
             echo 'cantidad'.$registro->rowCount().'<br/>';
             if ($registro->rowCount() > 0) {
                $row = $registro->fetch(PDO::FETCH_ASSOC);
               if ( $usuario->getUsuario() == $row['email'] &&
               sha1($usuario->getPassword()) == $row['password']) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $this->getUsuario();
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                header('Location:?c=pantallaPrincipal&a=Index');

            } else {
                 
           echo '<script>   swal("Correcto!", "", "success"); </script>';
                 header('Location:index.php');
            }
        } else {
            echo 'no existe ningun rejistro';
              header('Location:index.php');
        }
    }

    function getPassword() {
        return $this->password;
     }

    function setPassword($password) {
         $this->password =$password;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

}
