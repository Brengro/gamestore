<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("gamestore",$conexion);

$codigoHTML='
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
</head>

<body>
<div align="center">
	
    <table width="100%" border="1">
      <tr>
        <td bgcolor="#0099FF"><strong>Nombre</strong></td>
        <td bgcolor="#0099FF"><strong>Apellidos</strong></td>
        <td bgcolor="#0099FF"><strong>Correo</strong></td>
      </tr>';

        $consulta=mysql_query("SELECT * FROM usuario");
        while($dato=mysql_fetch_array($consulta)){
$codigoHTML.='
      <tr>
    
        <td>'.$dato['nombre'].'</td>
        <td>'.$dato['apellidos'].'</td>
        <td>'.$dato['email'].'</td>

		
		  
      </tr>';
      } 
$codigoHTML.='
    </table>
	
</div>
</body>
</html>';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("ListadoEmpleado.pdf");
?>
<H2 align="center"><a href="http://adf.ly/1011082/html-dompdf">DESCARGAR CODIGO FUENTE</a></H2>