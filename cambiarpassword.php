<?php
session_start();
include("Conexion.php");
if ($_POST["Grabar"]){
	$listado = "select * from  usuario where usuario ='$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$textoesp = $rs["password"];
		$actual = md5($_POST["actual"]);
	}

	

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="../Letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
-->
</style>
<link href="Span/Letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #000000;
}
-->
</style><title>Inicio</title>
<link href="letras.css" rel="stylesheet" type="text/css">
</head>

<body>

  <form id="form1" name="form1" method="post" action="cambiarpassword.php">
	<?php 
	if ($_POST["Grabar"]){
	
		if ($textoesp <> $actual){
		echo "<p class=Letra1_blanca>Su password actual no fue bien escrita</p>";
	}elseif ($_POST["nueva1"] <> $_POST["nueva2"]){
		echo "<p class=Contenidonegro>No repitio correctamente su password nueva</p>";
	} else{
		$nuevafinal = md5($_POST["nueva1"]);
		$editar="update usuario  set password    = '$nuevafinal' where usuario ='$_SESSION[$nusuario]' ";
		$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
		echo "<p class=Contenidonegro>Su password se actualizo correctamente</p>";
	}
	}
	?>
    <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3" align="center" class="Titulo">Cambio de password</td>
      </tr>
      <tr>
        <td class="Letras1">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="48%" align="right" class="Contenidonegro">Password actual</td>
        <td width="2%"><label for="actual"></label></td>
        <td width="50%"><input type="password" name="actual" id="actual" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" class="Contenidonegro">Nueva password</td>
        <td>&nbsp;</td>
        <td><input type="password" name="nueva1" id="nueva1" /></td>
      </tr>
      <tr>
        <td align="right" class="Contenidonegro">Repita nueva password</td>
        <td>&nbsp;</td>
        <td><input type="password" name="nueva2" id="nueva2" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center"><input type="submit" name="Grabar" id="Grabar" value="Grabar"></td>
      </tr>
    </table>
    
    <p align="center"><a href="inicio.php" class="Menu1">VOLVER</a></p>
</form>
</body>
</html>
