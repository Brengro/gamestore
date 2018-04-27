<?php

include 'configuracion/DAO.php';
include_once 'configuracion/Database.php';


/**
 *
 * @author Jonathan Antonio Cruz Araiza
 */
class TipoUsuarioDAO extends DAO {

    //Variables 
    private $tabla = 'tipo_usuario'; //nombre de tabla 
    //Propiedades de la entidad
    public $tipoUsuariKey;
    public $nombre;
    public $descripcion;

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
            $sql = "INSERT INTO tipo_usuario (nombre,descripcion)
		        VALUES ( ?, ?)";

            $this->con->prepare($sql)
                    ->execute(
                            array(
                                $obj->nombre,
                                $obj->descripcion
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


   
    public function update($obj = NULL) {
           
        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " nombre = ? , descripcion = ?"
                . " where tipoUsuariokey = ? ";

        $campos = array(
             $obj->nombre,
             $obj->descripcion,
             $obj->tipoUsuariKey);
        $stmt = $this->con->prepare($sql);
      
        
        if ($stmt->execute($campos)) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Método que permite consultar el id en la tabla.
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
            $key = $this->primaryKey;
        }
        $delete = "DELETE FROM " . $this->tabla .
                " WHERE tipoUsuarioKey='$key'";
        echo 'ELIMINAR '.$delete;
        $stmt = $this->con->prepare($delete);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function Listar() {
        try {
            $result = array();
            $query = "SELECT * FROM ".$this->getTabla();
            
     
            $stm = $this->con->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
