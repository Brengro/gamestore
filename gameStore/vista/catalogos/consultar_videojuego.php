<?php
include_once "../../configuracion/Database.php";
include_once "../../modelo/Videojuego.php";

//obtiene el id de la entidad  a modificar
$id = isset($_GET['id'])?$_GET['id']:die('ERROR:missing ID.');

//obtiene la conexion hacia la base de dato 
$entidad = new Videojuego();
$entidad->id = $id;
$entidad->readId();

//Establese el titulo de la pagina
$page_title = "Detalle Entidad";
$url = '../../';
include_once "../layout/layout_header.php"; //header
?>

<h1><?php echo $page_title?></h1>
<div class="right-button-margin ">
 <a href='list_videojuegos.php' class='btn btn-primary'>Consultar</a>
</div>
<!--Botón de consultar entidades-->

<!--Procesar la información-->

<!--Forma a modificar el registro entidad-->

<form action='' method='POST'>
    <table class='table table-hover'>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' 
                       id='nombre' class="form-control" 
                       value="<?php echo $entidad-> getNombre()."valo".$entidad->getUrlImagen(); ?>"></td>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td><input type='text' name='descripcion' 
                       id='descripcion' class="form-control" 
                       value="<?php echo $entidad-> getDescripcion(); ?>" ></td>
        </tr>
        <tr>
            <td>Precio Actual</td>
            <td><input type='number' name='precioActual' 
                       id='precioActual' class="form-control" 
                       value="<?php echo $entidad-> getPrecioActual(); ?>"></td>
        </tr>
         <tr>
            <td>Descuento</td>
            <td><input type='number' name='descuento' 
                       id='descuento' class="form-control" 
                       value="<?php echo $entidad-> getDescuento(); ?>"></td>
        </tr>
         <tr>
          <td>Imagen</td>
            <td>
              
              <img class='grey_box' src='../../media/img/<?phpecho $entidad->getUrlImagen();?>' alt=''/>

            </td>
        </tr>
    </table>
</form>


<?php
include_once "../layout/layout_footer.php";
?>