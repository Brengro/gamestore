<?php
include_once '../../configuracion/Database.php';
include_once '../../modelo/Videojuego.php';
// Obtiene la conexión hacia la base de datos
$videojuego = new Videojuego();
// Establece el título de la página
$page_title = "Alta Videojuego";
$url = '../../';
include_once "../layout/layout_header.php"; //header
?>

<h1><?php echo $page_title ?></h1>
<!-- Aqui va el contenido -->

<div class="right-button_margin ">
    <a href='list_videojuegos.php' onchange="" class='btn btn-primary'>Consultar</a>
</div>
<form action='' method='POST' enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type='text' name='nombre' id='nombre' class="form-control">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type='text' name='descripcion' id='descripcion' class="form-control">
    </div>
    <div class="form-group">
        <label for="precioActual">Precio Actual</label>
        <input type='number' name='precioActual' id='precioActual' class="form-control">
    </div>
    <div class="form-group">
        <label for="descuento">Descuento</label>
        <input type='number' name='descuento' id='descuento' class="form-control">
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" name="archivo" accept="image/png, .jpeg, .jpg, image/gif">
    </div>
                <?php
                if (isset($_FILES['archivo']['name'])) {
                   $videojuego->agregarArchivo();
                }
                ?>
    <div class="form-group">
        <button  type='submit' name='enviar' id='enviar' class="btn btn-primary" >
                    Insertar</button>
    </div>
</form>



<?php
//Vía método POSTa
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    $videojuego->setNombre($_POST['nombre']);
    $videojuego->setDescripcion($_POST['descripcion']);
    $videojuego->setPrecioActual($_POST['precioActual']);
    $videojuego->setPrecioDescuento($_POST['precioActual']);
    $videojuego->setDescuento($_POST['descuento']);
    $videojuego->setUrlImagen($_FILES['archivo']['name']);
    if ($videojuego->insert()) {
        echo "<div class='alert alert-success'></div>";
    } else {
        echo "<div class='alert alert-success'></div>";
    }
}
?>

<?php
include_once "../layout/layout_footer.php"; //footer
?>