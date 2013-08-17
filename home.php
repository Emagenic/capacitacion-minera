<?php include("Conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
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
<link href="letras.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="33%" class="Titulo">Bienvenidos</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <?php
	$listado = "select * from  home";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$texto = str_replace("\r\n","<br>",$rs["contenido"]);
	}
?>
      <tr>
        <td><div align="justify"><span class="Contenidonegro"><?php echo $texto; ?></span></div></td>
      </tr>
      <tr>
        <td height="5"></td>
      </tr>
      <tr>
        <td><div align="center"><img src="grafica/home.png" width="316" /></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
