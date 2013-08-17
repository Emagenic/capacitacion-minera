<?php
session_start();
include("../Conexion.php");
if ($_POST["Agregar"]){
	$fecha = $_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
	$insertar="INSERT INTO incidentes_trabajador (fecha ,titulo,descripcion,act, empresa,trabajador) 
	VALUES('$fecha','$_POST[Titulo]','$_POST[Descripcion]', 'si', '$_SESSION[$nusuario]','$_GET[rut]')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);
}

if ($_GET["fun"]=="eli"){
	$editar="update  incidentes_trabajador set act  = 'no' where empresa = '$_SESSION[$nusuario]' and trabajador ='$_GET[rut]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../letras.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="289" align="center"><span class="Titulo">Incidentes del trabajador</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="justify"><p class="Menu1" align="center">
  <?php 
    $listado = "select * from trabajador where rut ='$_GET[rut]' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		echo $rs["nombre"];
 } ?>
      
</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Incidentes</td>
    </tr>
  <?php 
    $listado = "select * from incidentes_trabajador where act ='si' and trabajador = '$_GET[rut]'";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td class="Contenidonegro"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="Titulo"><?php echo $rs["titulo"]; ?></td>
        </tr>
      <tr>
        <td class="Contenidonegro"><?php echo date("d/m/Y",strtotime($rs["fecha"])); ?></td>
        </tr>
        <tr>
        <td class="Contenidonegro">Empresa: 
		<?php 
	$listados = "select * from empresas where rut  = '$rs[empresa]' ";
	$sentencias = mysql_query($listados,$conn);
	while($rss=mysql_fetch_array($sentencias,$mibase)){
		echo $rss["nombre"];
	}
		 ?>
         </td>
        </tr>
      <tr>
        <td class="Contenidonegro"><?php echo str_replace("\r\n","<br>",$rs["descripcion"]);  ?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
    </table></td>
    </tr>
  <?php } ?>
</table>
    
    </td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="center"><a href="detalletrabajadores.php" class="Menu1">VOLVER</a></td>
  </tr>
</table>
</body>
</html>
