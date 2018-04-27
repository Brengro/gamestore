<?php
include_once "../../configuracion/Database.php";
include_once "../../modelo/Videojuego.php";

//obtiene el id de la entidad  a modificar
$id = isset($_GET['id'])?$_GET['id']:die('ERROR:missing ID.');

//obtiene la conexion hacia la base de dato 
$entidad = new Videojuego();
$entidad->id = $id;
$entidad->readId();
$url = '../../';
//Establese el titulo de la pagina
$page_title = "Modifica una entidad";
include_once "../layout/layout_header.php"; //header
?>

<h1><?php echo $page_title?></h1>
<div class="right-button-margin ">
 <a href='list_entidad.php' class='btn btn-primary'>Consultar</a>
</div>
<!--Botón de consultar entidades-->

<!--Procesar la información-->

<!--Forma a modificar el registro entidad-->
<form action='' method='POST'>
    <table class='table table-hover'>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' value="<?php echo $entidad-> nombre; ?>"
                       class="form-control"></td>
        </tr>
        <tr>
            <td>Alias</td>
            <td><input type='text' name='alias' value="<?php echo $entidad->alias; ?>"
                       class="form-control"></td>
        </tr>
        <tr>
            <td>Activo</td>
            <td><input type='checkbox' name='activo' <?php echo ($entidad->activo == 1) ? 'checked' : '' ?>
                       class="form-check-input"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button type='submit' name='enviar' id='enviar' class="btn btnprimary">Modificar</button></td>
        </tr>
    </table>
</form>

<?php
//Vía método POSTa
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    $entidad->nombre = $_POST['nombre'];
    $entidad->alias = $_POST['alias'];
    if (isset($_POST['activo'] )){
        $entidad->activo = 1;
    }else{
        $entidad->activo = 0;
    }
    if ($entidad->update()) {
        echo "<div class='alert alert-success'></div>";
    } else {
        echo "<div class='alert alert-danger'></div>";
    }
}
?>
<?php
include_once "../layout_footer.php";
?>