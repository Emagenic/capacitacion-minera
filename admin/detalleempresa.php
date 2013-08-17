<?php
session_start();
 include("../Conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../letras.css" rel="stylesheet" type="text/css" />
</head>

<body class="Titulo">
  <?php
	$listado = "select * from empresas where rut = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center"><?php echo $rs["nombre"];  ?></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left">Configuracion empresa</td>
      </tr>
      <tr>
        <td height="2" align="left" bgcolor="#333333"></td>
      </tr>
      <tr>
        <td align="left"><div align="left"><a href="detalleempresaeditar.php" class="Menu1">VER DATOS DE EMPRESA</a></div></td>
      </tr>
      <tr>
        <td align="left"><div align="left"><a href="detalletrabajadores.php" class="Menu1">VER TRABAJADORES</a></div></td>
      </tr>
      <tr>
        <td align="left"><div align="left"></div></td>
      </tr>
      <tr>
        <td align="left"><div align="left">Mantenedores</div></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#333333"></td>
      </tr>
      <tr>
        <td align="left"><a href="herramientasyepp.php" class="Menu1">VER IMPLEMENTOS A CARGOS</a></td>
      </tr>
      <tr>
        <td><a href="obras_empresa.php" class="Menu1">VER FAENAS</a></td>
      </tr>
      <tr>
        <td><a href="cargos_trabajadores.php" class="Menu1">VER PUESTOS DE TRABAJO</a></td>
      </tr>
    </table></td>
    <td width="180" align="center" valign="top">
    <?php if (file_exists("../imagenes/empresas/$_SESSION[$nusuario].png")){  ?>
    <img src="../imagenes/empresas/<?php echo $_SESSION["$nusuario"]; ?>.png" width="150" />
    <?php } ?>
    </td>
  </tr>
</table>
  <?php } ?>
</body>
</html>
