<?php
session_start();
include("../Conexion.php");
if ($_POST["Agregar"]){
	$insertar="INSERT INTO detalle_servicios (servicio ,contenido) VALUES('$_POST[titulo2]','$_POST[detalle2]')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);

}

if ($_POST["Modificar"]){
	$editar="update  servicios set contenido = '$_POST[contenido]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
if ($_POST["Editar"]){
	$editar="update  detalle_servicios set servicio = '$_POST[titulo1]',contenido = '$_POST[detalle1]' where iddetalle = '$_GET[id]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
if ($_GET["act"]=="eli"){
	$eliminar="delete from  detalle_servicios where iddetalle = '$_GET[id]' ";
	$sentencia = mysql_query($eliminar,$conn)or die("Error al grabar la venta: ".mysql_error);
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
  <table width="30%" border="1" align="center" cellpadding="1" cellspacing="0">
    <tr>
      <td><div align="center"><a href="servicios.php?act=new" class="Subtitulo1">AGREGAR servicio</a></div></td>
    </tr>
  </table>
  <?php if($_GET["act"]=="new"){ ?>
<form id="form3" name="form1" method="post" action="servicios.php">
<table width="70%" border="1" align="center" cellpadding="1" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2"><div align="center" class="Subtitulo1">agregar detalle de PRODUCTOS</div></td>
          </tr>
          <tr>
            <td width="44%">&nbsp;</td>
            <td width="56%">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top" class="Letras3"><div align="right">Titulo</div></td>
            <td><label>
              <input name="titulo2" type="text" class="Letras1" id="titulo2">
            </label></td>
          </tr>
          <tr>
            <td valign="top" class="Letras3"><div align="right">Detalle</div></td>
            <td><label>
              <textarea name="detalle2" cols="50" rows="8" class="Letras1" id="detalle2"></textarea>
            </label></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
                <label>
                <input type="submit" name="Agregar" id="Agregar" value="Agregar" />
                </label>
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </form>
<p>
    <?php } elseif($_GET["act"]=="edi"){ 
  
  	$listado = "select * from detalle_servicios where iddetalle ='$_GET[id]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
  
  ?>
</p>
<form id="form2" name="form1" method="post" action="servicios.php?id=<?php echo $_GET["id"]; ?>">
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><div align="center" class="Subtitulo1">editar detalle de PRODUCTOS</div></td>
      </tr>
      <tr>
        <td width="44%">&nbsp;</td>
        <td width="56%">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" class="Letras3"><div align="right">Titulo</div></td>
        <td><label>
          <input name="titulo1" type="text" class="Letras1" id="titulo1" value="<?php echo $rs["servicio"]; ?>">
        </label></td>
      </tr>
      <tr>
        <td valign="top" class="Letras3"><div align="right">Detalle</div></td>
        <td><label>
          <textarea name="detalle1" cols="50" rows="8" class="Letras1" id="detalle1"><?php echo $rs["contenido"]; ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <label>
            <input type="submit" name="Editar" id="Editar" value="Editar" />
            </label>
        </div></td>
      </tr>
    </table>
    <p align="center"><a href="sesion.php" class="Subtitulo1">Volver</a></p>
</form>
<?php }} else {
	$listado = "select * from servicios";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$textoesp = $rs["contenido"];
	}
	?>

  <form id="form1" name="form1" method="post" action="servicios.php">
    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><div align="center" class="Subtitulo1">PRODUCTOS</div></td>
      </tr>
      <tr>
        <td width="44%">&nbsp;</td>
        <td width="56%">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" class="Letras3"><div align="right">Contenido</div></td>
        <td><label>
          <textarea name="contenido" id="contenido" cols="45" rows="5"><?php echo $textoesp; ?> </textarea>
        </label></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <label>
            <input type="submit" name="Modificar" id="Modificar" value="Modificar" />
          </label>
        </div></td>
      </tr>
    </table>
    <p align="center"><a href="sesion.php" class="Subtitulo1">Volver</a></p>
</form>

<?php 
	}
	$listado = "select * from  detalle_servicios";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
?>


  <table width="60%" border="1" align="center" cellpadding="1" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="Letras3"><div align="right">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="89%"><div align="right"><a href="servicios.php?act=eli&id=<?php echo $rs["iddetalle"]; ?>" class="Letras3"><strong>Eliminar</strong></a>&nbsp;</div></td>
                  <td width="11%"><img src="b_drop.png" width="16" height="16"></td>
                </tr>
                <tr>
                  <td><div align="right"><a href="servicios.php?act=edi&id=<?php echo $rs["iddetalle"]; ?>" class="Letras3"><strong>Editar</strong></a>&nbsp;</div></td>
                  <td><img src="Lapiz.png" width="16" height="16"></td>
                </tr>
              </table>
          </div></td>
          <td class="Letras3">&nbsp;</td>
          <td width="41%" rowspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><a href="../grafica/servicios/Upload_foto.php?id=<?php echo $rs["iddetalle"]; ?>" class="Subtitulo1">Cambiar imagen</a></div></td>
              </tr>
              <tr>
                <td><div align="center"><img src="../grafica/servicios/<?php echo $rs["iddetalle"]; ?>.jpg" width="200"  /></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="17%" valign="top" class="Letras3"><div align="right"><strong>Titulo:&nbsp;</strong></div></td>
          <td width="42%" valign="top" class="Letras3"><?php echo $rs["servicio"]; ?></td>
        </tr>
        <tr>
          <td valign="top" class="Letras3"><div align="right"><strong>Descripcion:&nbsp;</strong></div></td>
          <td valign="top" class="Letras3"><?php echo $rs["contenido"]; ?></td>
        </tr>
        <tr>
          <td class="Letras3">&nbsp;</td>
          <td class="Letras3">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php } ?>
</body>
</html>
