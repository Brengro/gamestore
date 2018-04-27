<?php
//Código configuracion de la base de datos
include_once '../../configuracion/Database.php';
include_once '../../modelo/Videojuego.php';
//$database = new Database();
//$db = $database->getConexion();
$videojuegos = new Videojuego();
// Establece cabecerEntidada
$page_title = "Listado de Entidades";
$url = '../../';
include_once "../layout/layout_header.php";


echo "<div class='right-button-margin'>";
echo "<a href='crea_videojuego.php' class='btn btn-primary'>Crear</a>";
echo "</div>";

// El contenido va aqui


$videojuegos->gridHtml();

//POR QUE ESTAN ESTAS BARIABLE $num_registro,$reg_por_pagina;
// Establece el footer
include_once "../layout/layout_footer.php";
?>


