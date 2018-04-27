<?php
include_once './layout/layout_header.php';
include_once '../configuracion/Database.php';
include_once '../modelo/videoJuego.php';
include_once '../modelo/login.php';

$videoJuego = new VideoJuego();
?>
<div class="carousel-item">
    <img src="../media/img/fifaone.png" alt=""/>
  <div class="carousel-caption d-none d-md-block" >
    <h5 >...</h5>
    
    
    <p>...</p>
  </div>
</div> 

<?php $videoJuego->gridHtml() ?>

<?php
include_once './layout/layout_footer.php';
?>