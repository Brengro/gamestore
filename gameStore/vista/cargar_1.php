<?php include_once '../modelo/CargarArchivo.php';
$cargarArchivo = new CargarArchivo();
?>

<head>

    <meta charset="utf-8">

    <title>Subir una o varias imagenes al servidor</title>

</head>



<body>
        <?php  
    if(isset( $_FILES)){
    $cargarArchivo->agregarArchivo();
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data" name="inscripcion">

        <input type="file" name="archivo[]" multiple="multiple">

        <input type="submit" value="Enviar"  class="trig">

    </form>


</body>

</html>