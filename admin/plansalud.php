<?php
session_start();
include("../Conexion.php");
if ($_POST["Agregar"]){
	$insertar="INSERT INTO plansalud (plan ,descuento,act) 
	VALUES('$_POST[nombre_plan]','$_POST[descuento]', 'si')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);
}
if ($_POST["Modificar"]){
	$editar="update  plansalud set plan  = '$_POST[nombre_plan2]',descuento = '$_POST[descuento2]' where id_plan = '$_GET[id]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
if ($_GET["fun"]=="eli"){
	$editar="update  plansalud set act  = 'no' where id_plan = '$_GET[id]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../letras.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>
</head>


<div align="center">
  <p><span class="Titulo">Planes de salud</span></p><p>
  <table width="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#FF9900">
    <tr>
      <td height="15" align="center" valign="middle"><div align="center"><a href="plansalud.php?fun=new" class="Letra1_blanca">NUEVO PLAN</a></div></td>
    </tr>
  </table>
  </p>
  </div>
<?php if ($_GET["fun"]=="new"){ ?>
<form action="plansalud.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','descripcion','','R');return document.MM_returnValue">
  <table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50%" align="left" class="Contenidonegro"><div align="right">Nombre del plan</div></td>
      <td width="50%"><div align="left">
        <input name="nombre_plan" type="text" class="Contenidonegro" id="nombre_plan" onkeyup="chk_usuario();" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" class="Contenidonegro"><div align="right">Descuento</div></td>
      <td><label>
        <input name="descuento" type="text" class="Contenidonegro" id="descuento" onkeyup="chk_usuario();" maxlength="1000"/>
      </label></td>
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
    $listado = "select * from plansalud where id_plan ='$_GET[id]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
?>
<form action="plansalud.php?id=<?php echo $_GET["id"]; ?>" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre2','','R','descripcion2','','R');return document.MM_returnValue">
  <table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50%" align="left" class="Contenidonegro"><div align="right">Nombre del plan</div></td>
      <td width="50%"><div align="left">
        <input name="nombre_plan2" type="text" class="Contenidonegro" id="nombre_plan2" onkeyup="chk_usuario();" value="<?php echo $rs["plan"] ?>" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td align="left" valign="top" class="Contenidonegro"><div align="right">Descuento</div></td>
      <td><label>
        <input name="descuento2" type="text" class="Contenidonegro" id="descuento2" onkeyup="chk_usuario();" value="<?php echo $rs["descuento"] ?>" maxlength="1000"/>
      </label></td>
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
<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Editar</div></td>
    <td width="10%" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Eliminar</div></td>
    <td width="51%" bgcolor="#FF9900" class="Letra1_blanca">Plan</td>
    <td width="29%" bgcolor="#FF9900" class="Letra1_blanca">Descuento</td>
  </tr>
  <?php 
    $listado = "select * from plansalud where act ='si' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td><div align="center"><a href="plansalud.php?fun=edi&amp;id=<?php echo $rs["id_plan"]; ?>"><img src="Lapiz.png" width="16" height="16" border="0" /></a></div></td>
    <td><div align="center"><a href="plansalud.php?fun=eli&amp;id=<?php echo $rs["id_plan"]; ?>" onClick=" return confirm('¿Está Seguro que desea eliminar?');"><img src="b_drop.png" alt="Eliminar cargo" width="16" height="16" border="0" /></a></div></td>
    <td class="Contenidonegro"><?php echo $rs["plan"]; ?></td>
    <td class="Contenidonegro"><?php echo $rs["descuento"]; ?></td>
  </tr>
  <?php } ?>
</table>
<p align="center"><a href="sesion.php" class="Menu1">VOLVER</a></p>
</body>
</html>
