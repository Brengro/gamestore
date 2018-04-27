<?php

/**
 * Description of videoJuego
 *
 * @author Jonathan Antonio Cruz Araiza
 */
class VideoJuego {

    private $videoJuegoKey;
    private $nombre;
    private $precioActual;
    private $accion = "true";
    private $precioDescuento;
    private $descuento;
    private $descripcion;
    private $cantidad;
    private $existencia;
    private $urlImagen ;
    public $con;
    public $tabla = 'videojuego';



    public function __construct() {
        $db = Database::getInstance();
        $this->con = $db->getConexion();
    }

        public function insert() {
        $insert = "INSERT INTO " . $this->tabla .
                ' (nombre, 
                   descripcion, 
                   descuento, 
                   precio_actual, 
                   url_imagen) VALUES ' .
                " ('" . $this->nombre . "',
                '". $this->descripcion."',
                " . $this->descuento . ",
                ".$this->precioActual.",
                ' ..media/img/".$this->urlImagen."')";
      echo $insert;
        $stmt = $this->con->prepare($insert);
        $stmt->execute();
        echo $stmt->rowCount() . ' renglones afectados';
    }

    public function __toString() {
        return 'Nombre='        .$this->nombre . 
               'Description='   .$this->descripcion . 
               'Descuento='     .$this->descuento.
               'precioActual='   .$this->precioActual. 
               'urlImagen'   .$this->urlImagen;
    }
    
       public function delete(){
       
        $delete = ' Delete From '. $this->tabla.
                  ' Where  id ='. $this->id;
      
        $stmt = $this->con->prepare($delete);
        $stmt->execute();
        echo "<script>
	          location='../vista/list_entidad.php';
		  </script>	  
	   ";
    }

    /**
     * Método que consulta a la tabla Entidad y extrae todos los registros.
     * @return Objeto recorset que contiene todos los registros
     */
    public function read() {
        $query = 'SELECT videojuego_key, nombre, descripcion, url_imagen, precio_actual ' .
                ' FROM ' . $this->tabla .
                ' ORDER BY nombre';
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt;
    }



    public function readId() {
        $query = 'SELECT videojuego_key, nombre, descripcion,descuento, url_imagen , precio_actual ' .
                ' FROM ' . $this->tabla .
                ' WHERE videojuego_key= ' . $this->id .
                ' ORDER BY nombre' .
                ' LIMIT 0,1';

        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setNombre($row['nombre']);
        $this->setDescripcion($row['descripcion']);
        $this->setUrlImagen($row['url_imagen']);
   
        $this->descuento = $row['descuento'];
        $this->precioActual = $row['precio_actual'];

    }
    //factori

    /**
     * Método que imprime el grid de los registros de entidad
     */
    public function juegos() {
        $prodctos = "<div class='' id='mar-01'>" .
                "<div class='row mar-bouton' id='mar-01'>";

        $registros = $this->read();
        if ($registros->rowCount() > 0) {

            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                
                if ($row['url_imagen'] == null) {//validacion en caso de que la url se encuente vacia
                    $url_imagen = "";
                } else {
                    $url_imagen = $row['url_imagen'];
                }
                $prodctos = $prodctos."<div class='col-xs-4 col-md-3'>".
                "<div class='card' style='width: 18rem;'>".
                "<div class='div-conten-cart'>".
                "<div class='div-cart' >".
                "<img class='blue_box' src='media/img/".$url_imagen."' alt=''/>".
                "</div>".
                "<div class='div-cart'>".
                "<img class='grey_box' src='media/img/saleoff.png' alt=''/>".
                "</div>".
                "</div>".
                "<div class='card-body'>".
                "<h5 class='card-title'>".$row['nombre'].$url_imagen."</h5>".
                "<p class='card-text'>".$row['descripcion']."</p>".
                 "<h1>".'$'.$row['precio_actual']."</h1>".
                "</div>" .
                "</div>" .
                "</div>";
            }
            echo $prodctos;
        } else {
            echo "";
        }
    }

    public function gridHtml() {
        $numRenglon = 0;
        $tableHtml = "<table class='table'>" .
                "<thead class='thead-dark'>".
                "<tr>" .
                "<th scope='col'>#</th>" .
                "<th scope='col' class='hide'>juego_key</th>" .
                "<th scope='col'>Nombre</th>" .
                "<th scope='col'>Descripcion</th>" .
                "<th scope='col'>precio Actual</th>" .
                 "<th scope='col'>Imagen</th>" .
                "<th scope='col'></th>" .
                "<th scope='col'></th>" .
                "<th scope='col'></th>" .
                "</tr>".
                "</thead>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {

            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                if ($row['url_imagen'] == null) {
                    $url_imagen = "";
                } else {
                    $url_imagen = $row['url_imagen'];
                }
                $tableHtml = $tableHtml . "<tbody> <tr>" 
                        ."<th scope='row'>".($numRenglon = $numRenglon+1)."</th>"
                        ."<td class='hide'>" . $row['videojuego_key'] . "</td>" 
                        ."<td>" . $row['nombre'] . "</td>" 
                        ."<td>" . $row['descripcion'] . "</td>" 
                        ."<td>" .$row['precio_actual']
                        ."</td>" 
                        ."<td>"."<div class='div-conten-cart'>"
                        . "<div class='div-cart'>"
                        . "<img class='blue_box' src='media/img/". $url_imagen . "' alt=''/>"
                        . "</div>"
                        . "<div class='div-cart' >"
                        . "<img class='grey_box' src='media/img/saleoff.png' alt=''/>"
                        . "</div>"
                        . "</div>"
                        ."</td>"
                        ."</td>" .
                        "<td><a href='consultar_videojuego.php?id=".$row['videojuego_key']."' class='btn btn-primary'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Leer</a></td>" .

                        "<td><a href='update_videojuego.php?id=".$row['videojuego_key']."' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Editar</a></td>" .
                        
                        "<td><a href='eliminar_videojuego.php?id=".$row['videojuego_key']."' class='btn btn-danger delete-object'>"
                        . "<span class='glyphicon glyphiconremove'></span>Eliminar</a></td>"
                        ."</tr>"
                        ."</tbody>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "";
        }
    }
 function agregarArchivo(){
         # definimos la carpeta destino
    $carpetaDestino = "../../media/img/";
    # si hay algun archivo que subir
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]) {
        
        # recorremos todos los arhivos que se han subido
        for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {
           // $this->setUrlImagen($_FILES["archivo"]["name"]);
            # si es un formato de imagen
            if ($_FILES["archivo"]["type"] == "image/jpeg" || $_FILES["archivo"]["type"] == "image/jpg" || $_FILES["archivo"]["type"] == "image/gif" || $_FILES["archivo"]["type"] == "image/png") {
                
                # si exsite la carpeta o se ha creado
                if (file_exists($carpetaDestino) || @mkdir($carpetaDestino,0777)) {
                    $origen = $_FILES["archivo"]["tmp_name"];
                    $destino = $carpetaDestino . $_FILES["archivo"]["name"];
                    
                    # movemos el archivo
                    if (@move_uploaded_file($origen, $destino)) {
                        echo "<br>" . $_FILES["archivo"]["name"] . " movido correctamente";
                  
                    } else {
                        echo "<br>No se ha podido mover el archivo: " . $_FILES["archivo"]["name"];
                    }
                } else {
                    echo "<br>No se ha podido crear la carpeta: " . $carpetaDestino;
                }
            } else {
                echo "<br>" . $_FILES["archivo"]["name"] . " - NO es imagen jpg, png o gif";
            }
        }
    } else {
        echo "<br>No se ha subido ninguna imagen";
    }
    }
    function getVideoJuegoKey() {
        return $this->videoJuegoKey;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecioActual() {
        return $this->precioActual;
    }

    function getPrecioDescuento() {
        return $this->precioDescuento;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getExistencia() {
        return $this->existencia;
    }

    function setVideoJuegoKey($videoJuegoKey) {
        $this->videoJuegoKey = $videoJuegoKey;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecioActual($precioActual) {
        $this->precioActual = $precioActual;
    }

    function setPrecioDescuento($precioDescuento) {
        $this->precioDescuento = $precioDescuento;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getAccion() {
        return $this->accion;
    }

    function setAccion($accion) {
        $this->accion = $accion;
    }

        function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    function setUrlImagen($urlImagen) {
        $this->urlImagen = $urlImagen;
    }

    function getUrlImagen() {
        $this->urlImagen;
    }

}
