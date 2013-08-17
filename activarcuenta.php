<link href="letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo2 {
	font-family: Verdana;
	font-size: 12px;
}
-->
</style>
<p align="center" class="Titulo">Felicidades</p>
<p align="center" class="Contenidonegro">SU CUENTA DE USUARIO HA SIDO ACTIVADA CORRECTAMENTE. AHORA SE LE ASIGNARAN LOS PERFILES NECESARIOS PARA PODER TRABAJAR EN EL SISTEMA.</p>
<div align="center"></div>
<div align="center">
  <?php
include("Conexion.php");
if ($_GET["f"]=="act"){
	$insertar = "UPDATE usuario  SET activa ='si' WHERE correo = '".$_GET["mail"]."' " ; 
	$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
}
?>
  <img src="http://www.emagenic.cl/imagenes/logo.jpg" width="200" /></div>
