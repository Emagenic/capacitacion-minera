<?php
session_start();
include("../Conexion.php");
if ($_POST["Grabar"]){
	$editar="update cursos  set contenido   = '$_POST[contenido]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
if ($_POST["Grabardetalle"]){
	$insertar="INSERT INTO detallecursos (codsense ,descripcion,horas) 
	VALUES('$_POST[codigo]','$_POST[descripcion]','$_POST[horas]')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);	
}
if($_GET["fun"]=="eli"){
	$editar="delete from detallecursos  where codsense   = '$_GET[id]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
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
<link href="../letras.css" rel="stylesheet" type="text/css" />
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
<link href="Span/letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #000000;
}
-->
</style><title>Inicio</title></head>

<body>
<p>
  <?php if($_GET["fun"]=="new"){ ?>
</p>
<form id="form2" name="form2" method="post" action="cursos.php">
  <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" align="center" class="Titulo">Nuevo curso</td>
    </tr>
    <tr>
      <td width="18%" class="Contenidonegro">Codigo sense</td>
      <td width="2%">&nbsp;</td>
      <td width="80%"><label for="codigo"></label>
      <input name="codigo" type="text" class="Contenidonegro" id="codigo" size="15" /></td>
    </tr>
    <tr>
      <td class="Contenidonegro">Descripcion</td>
      <td>&nbsp;</td>
      <td><input name="descripcion" type="text" class="Contenidonegro" id="descripcion" size="60" /></td>
    </tr>
    <tr>
      <td class="Contenidonegro">Horas</td>
      <td>&nbsp;</td>
      <td><input name="horas" type="text" class="Contenidonegro" id="horas" size="15" /></td>
    </tr>
    <tr>
      <td height="5" colspan="3"></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input name="Grabardetalle" type="submit" class="botones" id="Grabardetalle" value="Grabar" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?php
} else {
	$listado = "select * from   cursos";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$textoesp = $rs["contenido"];
	}
	?>
</p>
  <form id="form1" name="form1" method="post" action="cursos.php">
    <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="center"><span class="Titulo">CURSOS</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="317" align="center"><span class="Menu1">CONTENIDO</span></td>
        <td width="233" align="center"><a href="../grafica/Upload_foto.php?id=cursos" class="Menu1">CAMBIAR IMAGENES</a></td>
      </tr>
      <tr>
        <td><textarea name="contenido" cols="60" rows="15" class="Contenidonegro" id="contenido"><?php echo $textoesp; ?> </textarea></td>
        <td align="center" valign="top"><img src="../grafica/cursos.png" width="150" /></td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="8%" bgcolor="#333333" class="Letra1_blanca">Eliminar</td>
            <td width="12%" bgcolor="#333333" class="Letra1_blanca">Sense</td>
            <td width="56%" bgcolor="#333333" class="Letra1_blanca">Descripcion</td>
            <td width="14%" bgcolor="#333333" class="Letra1_blanca">Horas</td>
            <td width="10%" bgcolor="#333333" class="Letra1_blanca">PDF</td>
          </tr>
          <?php
    $listado = "select * from  detallecursos";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
	  
	  ?>
          <tr>
            <td align="center" class="Contenidonegro"><a href="cursos.php?fun=eli&id=<?php echo $rs["codsense"]; ?>"><img src="b_drop.png" width="16" height="16" /></a></td>
            <td align="center" class="Contenidonegro"><?php echo $rs["codsense"]; ?></td>
            <td class="Contenidonegro"><?php echo $rs["descripcion"]; ?></td>
            <td align="center" valign="middle" class="Contenidonegro"><?php echo $rs["horas"]; ?></td>
            <td align="center" valign="middle" class="Contenidonegro"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="middle"><a href="../catalogos/Upload_foto.php?id=<?php echo $rs["codsense"]; ?>" class="Contenidonegro">Cambiar</a></td>
              </tr>
              <tr>
                <td height="5" align="center" valign="middle"></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><a href="../catalogos/<?php echo $rs["codsense"]; ?>.pdf" target="new"><img src="../grafica/pdf.jpg" width="20" /></a></td>
              </tr>
            </table>              <a href="../catalogos/<?php echo $rs["codsense"]; ?>.jpg" target="new"></a></td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="5" align="center" valign="middle" class="Contenidonegro"><a href="cursos.php?fun=new" class="Contenidonegro">Nuevo curso</a></td>
          </tr>
         
        </table></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="Grabar" id="Grabar" value="Grabar" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p align="center"><a href="sesion.php" class="Titulo">Volver</a></p>
</form>
<?php } ?>
</body>
</html>
