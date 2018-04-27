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

    function readUser($email = NULL , $password = NULL) {
        
     
        
        $query = 'SELECT email, password, tipoUsuarioKey' .
                ' FROM ' . $this->tabla.' Where email = "'.$email.'" and password = "'.$password.'" ' ;
              alert($query);
        $rst = $this->con->prepare($query);     
        $rst->execute();
        return $rst;
    }

    public function manterSession() {
        session_start();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
             echo "<script>
        	          alert('".$_SESSION['username'] ."'); 
        	          </script>";
            //  header('Location:pantalla_principal.php');
            echo "<script>
	          location='?c=pantallaPrincipal&a=Index&l=".$_SESSION['loggedin']."';
		    </script>";
          
        }
    }

    public function logout(){
    
        
        session_start();
        unset($SESSION['username']);
        session_destroy();
         
    
         echo "<script> location='?c=Login&a=Index&i=".$_SESSION['loggedin'] ." '; </script>";
           echo "<script>
	        alert('i=-->logout".$_SESSION['loggedin']."');
		  </script>";
    }

    public function login($usuario = NULL,$captcha = NULL) {
               session_start();
         $email = $usuario->getUsuario();
        $password =  sha1($usuario->getPassword());
             $registro = $this->readUser($email,$password);
            echo "login";
 
               
               echo "loginANTS";
          if($captcha!=0){
        echo "loginDESPIEZ";
             if ($registro->rowCount() > 0) {
                $row = $registro->fetch(PDO::FETCH_ASSOC);
             
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $this->getUsuario();
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
          
                echo "<script>
        	          location='?c=pantallaPrincipal&a=Index&l=".$_SESSION['loggedin'] ."';  
        	          </script>";
        
                } else {
                    echo "<script> location='index.php'; </script>";
                }
          }else{
          echo "<script> alert('seleccionar Captcha'); </script>";
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
    public function alert($valor){
        echo "<script> alert('".$valor."'); </script>";
    }
}
