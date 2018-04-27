<?php
$para      = 'jonycruz1996@gmail.com';
$titulo    = 'soy tu padre hahaha';
$mensaje   = 'Hola';
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($para, $titulo, $mensaje, $cabeceras)){
    echo "ahuevo si se mando prros :V";
}else{
    echo "valio vrga :(";
}
?>

