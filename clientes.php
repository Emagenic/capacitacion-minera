<?php
	include("Conexion.php");
	$listado = "select * from  clientes";
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
    <td colspan="3"><span class="Titulo">NUESTROS CLIENTES</span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="289" valign="top" align="justify"><span class="Contenidonegro"><?php echo $texto; ?></span></td>
    <td width="11">&nbsp;</td>
    <td width="200" valign="top"><img src="grafica/clientes.png" width="200" /></td>
  </tr>
  <tr>
    <td colspan="3" align="justify" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="justify" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php
    $listado = "select * from  empresas";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
	  ?>
      <tr>
        <td width="49%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><img src="imagenes/empresas/<?php echo $rs["rut"]; ?>.png" height="150" /></td>
          </tr>
          <tr>
            <td align="center" valign="top" class="Contenidonegro"><?php echo $rs["nombre"]; ?></td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
        </table></td>
        <td width="2%"><?php if($rs=mysql_fetch_array($sentencia,$mibase)){ ?></td>
        <td width="49%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><img src="imagenes/empresas/<?php echo $rs["rut"]; ?>.png" height="150" /></td>
          </tr>
          <tr>
            <td align="center" valign="top" class="Contenidonegro"><?php echo $rs["nombre"]; ?></td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <?php }} ?>
    </table></td>
  </tr>
</table>
</body>
</html>
