<?php
session_start();
include("../Conexion.php");
if ($_POST["Agregar"]){
	$insertar="INSERT INTO cargos_trabajadores (nombre_cargo ,descripcion,act, empresa) 
	VALUES('$_POST[nombre_cargo]','$_POST[descripcion]', 'si', '$_SESSION[$nusuario]')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);
}
if ($_POST["Modificar"]){
	$editar="update  cargos_trabajadores set nombre_cargo  = '$_POST[nombre2]',descripcion   = '$_POST[descripcion2]', empresa = '$_SESSION[$nusuario]' where id_cargo = '$_GET[id]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
if ($_GET["fun"]=="eli"){
	$editar="update  cargos_trabajadores set act  = 'no' where id_cargo = '$_GET[id]' ";
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
    <td align="center"><span class="Titulo">PUESTOS DE TRABAJO</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="289" valign="top" align="justify"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF9900">
      <tr>
        <td height="15" align="center" valign="middle"><a href="cargos_trabajadores.php?fun=new" class="Letra1_blanca">NUEVO CARGO</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="justify">
    
    
<?php if ($_GET["fun"]=="new"){ ?>

<form action="cargos_trabajadores.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre_cargo','','R','descripcion','','R');return document.MM_returnValue">
  <table width="400"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="33%" align="left" class="Contenidonegro"><div align="right">Nombre del cargo</div></td>
      <td width="67%"><div align="left">
        <input name="nombre_cargo" type="text" class="Contenidonegro" id="nombre_cargo" onkeyup="chk_usuario();" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" class="Contenidonegro"><div align="right">Descripcion</div></td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><textarea name="descripcion" cols="50" rows="8" class="Contenidonegro" id="descripcion"></textarea></td>
          </tr>
        </table>
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
    $listado = "select * from cargos_trabajadores where id_cargo ='$_GET[id]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
?>
<form action="cargos_trabajadores.php?id=<?php echo $_GET["id"]; ?>" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre2','','R','descripcion2','','R');return document.MM_returnValue">
  <table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50%" align="left" class="Contenidonegro"><div align="right">Nombre del cargo</div></td>
      <td width="50%"><div align="left">
        <input name="nombre2" type="text" class="Contenidonegro" id="nombre2" onkeyup="chk_usuario();" value="<?php echo $rs["nombre_cargo"] ?>" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" class="Contenidonegro"><div align="right">Descripcion</div></td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><textarea name="descripcion2" cols="50" rows="8" class="Contenidonegro" id="descripcion2"><?php echo $rs["descripcion"] ?></textarea></td>
          </tr>
        </table>
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
    <td width="5%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Editar</td>
    <td width="5%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Eliminar</td>
    <td width="20%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Cargo</td>
    <td width="51%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Descripcion</td>
  </tr>
  <?php 
    $listado = "select * from cargos_trabajadores where act ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td align="center"><a href="cargos_trabajadores.php?fun=edi&amp;id=<?php echo $rs["id_cargo"]; ?>"><img src="Lapiz.png" width="16" height="16" border="0" /></a></td>
    <td align="center">
    <a href="cargos_trabajadores.php?fun=eli&amp;id=<?php echo $rs["id_cargo"]; ?>" onClick=" return confirm('Está seguro que desea eliminar?');"><img src="b_drop.png" alt="Eliminar cargo" width="16" height="16" border="0" /></a></td>
    <td class="Contenidonegro"><?php echo $rs["nombre_cargo"]; ?></td>
    <td class="Contenidonegro"><?php echo $rs["descripcion"]; ?></td>
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
