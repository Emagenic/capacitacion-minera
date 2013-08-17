<?php
	include("Conexion.php");
	$listado = "select * from  cursos";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$texto = str_replace("\r\n","<br>",$rs["contenido"]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="letras.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		<!--
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
		}
		-->
	</style>
</head>
<body class="Letras3">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><span class="Titulo">CURSOS</span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="289" valign="top" align="justify"><span class="Contenidonegro"><?php echo $texto; ?></span></td>
    <td width="11">&nbsp;</td>
    <td width="200" valign="top"><img src="grafica/cursos.png" width="200" /></td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="justify" valign="top"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="12%" bgcolor="#333333" class="Letra1_blanca">Sense</td>
        <td width="64%" bgcolor="#333333" class="Letra1_blanca">Descripcion</td>
        <td width="16%" bgcolor="#333333" class="Letra1_blanca">Horas</td>
        <td width="8%" bgcolor="#333333" class="Letra1_blanca">PDF</td>
      </tr>
      <?php
    $listado = "select * from  detallecursos";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
	  
	  ?>
      <tr>
        <td class="Contenidonegro"><?php echo $rs["codsense"]; ?></td>
        <td class="Contenidonegro"><?php echo $rs["descripcion"]; ?></td>
        <td class="Contenidonegro"><?php echo $rs["horas"]; ?></td>
        <td class="Contenidonegro"><a href="catalogos/<?php echo $rs["codsense"]; ?>.pdf" target="new"><img src="grafica/pdf.jpg" width="20" /></a></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
