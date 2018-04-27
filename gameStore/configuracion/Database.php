<?php

class Database {

    private static $intance = NULL;
    private $host = NULL;
    private $database = NULL;
    private $user = NULL;
    private $password = NULL;
    private $con = NULL;

    
    /*
     * Método estatico que regresa la unica instancia de la clase  
     * @return object type Databese
     */
    public static function getInstance() {//2
        if(!self::$intance instanceof Database){
            self::$intance = new Database();
        }
        return self::$intance;
    }
    

    private function __construct() {//1
        $this->readXML(); //cargar los datos a la propiedades de mi clase
        $this->con = null;
        try {
            $this->con = new PDO('mysql:host=' .
                    $this->host . ';dbname=' . $this->database, $this->user, $this->password);
            
        } catch (PDOException $e) {
            echo 'No puede conectarse con la base de datos' .
            $e->getMessage();
        }
    }

    
    /*
     * extrae la coneccion de la BD
     * @return type connection
     */
    public function getConexion() {
        return $this->con;
        echo 'getConexion()';
    }

    /*
     * metodo que lee el archivo de configuracion de la base de datos xml
     */
    private function readXML() {
        $xmlFile = __DIR__ ."\configuracion.xml";
        if (file_exists($xmlFile)) {
            $xml = simplexml_load_file($xmlFile);
        } else {
            exit('Fallo al abrier el archivo configuraciones.xml');
        }
        $this->host = $xml->mysql[0]->host;
        $this->database = $xml->mysql[0]->database;
        $this->user = $xml->mysql[0]->user;
        $this->password = $xml->mysql[0]->password;
    }

}

?>  