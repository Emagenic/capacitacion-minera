<?php
session_start();
include("../Conexion.php");
if ($_POST["Agregar"]){
	$insertar="INSERT INTO obras_empresa (nombre_obra ,visible, empresa) 
	VALUES('$_POST[nombre_cargo]', 'si', '$_SESSION[$nusuario]')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);
}
if ($_POST["Modificar"]){
	$editar="update  obras_empresa set nombre_obra  = '$_POST[nombre2]' where id_obra = '$_GET[id]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
if ($_GET["fun"]=="eli"){
	$editar="update  obras_empresa set visible  = 'no' where id_obra = '$_GET[id]' ";
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
    <td align="center"><span class="Titulo">OBRAS EMPRESA</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="289" valign="top" align="justify"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF9900">
      <tr>
        <td height="15" align="center" valign="middle"><a href="obras_empresa.php?fun=new" class="Letra1_blanca">NUEVA OBRA</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="justify">
    
    
<?php if ($_GET["fun"]=="new"){ ?>

<form action="obras_empresa.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre_cargo','','R','descripcion','','R');return document.MM_returnValue">
  <table width="400"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="33%" align="left" class="Contenidonegro"><div align="right">Nombre de la obra</div></td>
      <td width="67%"><div align="left">
        <input name="nombre_cargo" type="text" class="Contenidonegro" id="nombre_cargo" onkeyup="chk_usuario();" size="50" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="Agregar" type="submit" class="botones" id="Agregar" value="Agregar" />
      </div></td>
    </tr>
  </table>
</form>
<?php } ?>

<?php if ($_GET["fun"]=="edi"){ 
    $listado = "select * from obras_empresa where id_obra ='$_GET[id]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
?>
<form action="obras_empresa.php?id=<?php echo $_GET["id"]; ?>" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre2','','R','descripcion2','','R');return document.MM_returnValue">
  <table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50%" align="left" class="Contenidonegro"><div align="right">Nombre de la obra</div></td>
      <td width="50%"><div align="left">
        <input name="nombre2" type="text" class="Contenidonegro" id="nombre2" value="<?php echo $rs["nombre_obra"] ?>" size="50" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="Modificar" type="submit" class="botones" id="Modificar" value="Modificar" />
      </div></td>
    </tr>
  </table>
</form>
<p>
  <?php } } ?>
</p>
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" bgcolor="#FF9900" class="Letra1_blanca" align="center">Editar</td>
    <td width="50" bgcolor="#FF9900" class="Letra1_blanca" align="center">Eliminar</td>
    <td width="300" bgcolor="#FF9900" class="Letra1_blanca" align="center">Descripcion</td>
  </tr>
  <?php 
    $listado = "select * from obras_empresa where visible ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td align="center"><a href="obras_empresa.php?fun=edi&amp;id=<?php echo $rs["id_obra"]; ?>"><img src="Lapiz.png" width="16" height="16" border="0" /></a></td>
    <td align="center">
      <a href="obras_empresa.php?fun=eli&amp;id=<?php echo $rs["id_obra"]; ?>" onClick=" return confirm('Está seguro que desea eliminar?');"><img src="b_drop.png" alt="Eliminar cargo" width="16" height="16" border="0" /></a></td>
    <td class="Contenidonegro"><?php echo $rs["nombre_obra"]; ?></td>
  </tr>
  <?php } ?>
</table>
    
    </td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="center"><a href="detalleempresa.php" class="Menu1">VOLVER</a></td>
  </tr>
</table>
</body>
</html>
