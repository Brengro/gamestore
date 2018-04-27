<?php

include_once 'modelo/Usuario.php';
include_once 'configuracion/DAO.php';

/*
 * Description of UsuarioDAO
 *
 * @author PC
 */

class UsuarioDAO extends DAO {

    //Variables 
    private $tabla = 'usuario'; //nombre de tabla 
    //Propiedades de la entidad
    public $usuariKey;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;

    function getTabla() {
        return $this->tabla;
    }

    function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    function __construct() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
    }

    /*
     * Método que permite consultar los datos de la tabla 
     */

    public function read($value = NULL, $key = NULL) {

        $sql = NULL;
        if (is_null($key)) {
            $sql = "SELECT * FROM " . $this->tabla;
            $this->showData($sql);
        } else {

            $sql = "SELECT * FROM " . $this->tabla . " WHERE {$key} = {$value}";
            //$this->showData($sql);
        }

        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /*
     * Método que permite insertar datos en la tabla.
     */

    public function insert($obj = NULL) {

        try {
            $sql = "INSERT INTO usuario (nombre,apellidos,email,password)
		        VALUES ( ?, ? , ? , ?)";

            $this->con->prepare($sql)
                    ->execute(
                            array(
                                $obj->getNombre(),
                                $obj->getApellidos(),
                                $obj->getEmail(),
                                $obj->getPassword()
                            )
            );
            
            echo $sql;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($obj = NULL) {

        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " nombre = ? , apellidos = ?"
             . " email = ? , password = ?"  
             . " where usuario_key = ? ";

        $campos = array(
            $obj->getNombre(),
            $obj->getApellidos(),
            $obj->getEmail(),
            $obj->getPassword(),
            $obj->getUsuariKey);
        $stmt = $this->con->prepare($sql);


        if ($stmt->execute($campos)) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Método que permite consultar el id en la tabla.
     * @author Jonathan Antonio Cruz Araiza 
     */

    public function readId() {

        if (is_null($this->getIdVehiculo())) {
            exit('Se requiere un valor para el ID');
        } else {
            $sql = " SELECT * FROM " . $this->tabla . " WHERE tipo_usuari_key={$this->getTipoUsuariKey()}";
        }

        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nombre = $row['nombre'];
        $this->descripcion = $row['descripcion'];
    }

    /*
     * Método que imprime el grid de los registros 
     */

    public function delete($key = NULL) {

        if (is_null($key)) {
            $key = $this->usuariKey;
        }
        $delete = "DELETE FROM " . $this->tabla .
                " WHERE usuario_key='$key'";
        echo 'ELIMINAR ' . $delete;
        $stmt = $this->con->prepare($delete);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function Listar() {
        try {
            $result = array();
            $query = "SELECT * FROM " . $this->getTabla();


            $stm = $this->con->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
