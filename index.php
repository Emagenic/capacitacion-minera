<?php
session_start();
include("Conexion.php");
if($_POST["Entrar"]){	
$password = md5($_POST["password_txt"]);
$listado = "select * from usuario where usuario  = '$_POST[nusuario_txt]' and password = '$password'  ";
$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
		$_SESSION["$nusuario"] = $rs["usuario"];
		$perfil = $rs["perfil"];
	}
}
if ($_GET["fun"]=="cerrar"){
	unset($_SESSION["$nusuario"]);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de gestion de prevencion de riesgos</title>

<script type="text/javascript">
/***********************************************
* IFrame SSI script II- © Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
* Visit DynamicDrive.com for hundreds of original DHTML scripts
* This notice must stay intact for legal use
***********************************************/

//Input the IDs of the IFRAMES you wish to dynamically resize to match its content height:
//Separate each ID with a comma. Examples: ["myframe1", "myframe2"] or ["myframe"] or [] for none:
var iframeids=["foro"]

//Should script hide iframe from browsers that don't support this script (non IE5+/NS6+ browsers. Recommended):
var iframehide="yes"

var getFFVersion=navigator.userAgent.substring(navigator.userAgent.indexOf("Firefox")).split("/")[1]
var FFextraHeight=parseFloat(getFFVersion)>=0.1? 16 : 0 //extra height in px to add to iframe in FireFox 1.0+ browsers

function resizeCaller() {
var dyniframe=new Array()
for (i=0; i<iframeids.length; i++){
if (document.getElementById)
resizeIframe(iframeids[i])
//reveal iframe for lower end browsers? (see var above):
if ((document.all || document.getElementById) && iframehide=="no"){
var tempobj=document.all? document.all[iframeids[i]] : document.getElementById(iframeids[i])
tempobj.style.display="block"
}
}
}

function resizeIframe(frameid){
var currentfr=document.getElementById(frameid)
if (currentfr && !window.opera){
currentfr.style.display="block"
if (currentfr.contentDocument && currentfr.contentDocument.body.offsetHeight) //ns6 syntax
currentfr.height = currentfr.contentDocument.body.offsetHeight+FFextraHeight; 
else if (currentfr.Document && currentfr.Document.body.scrollHeight) //ie5+ syntax
currentfr.height = currentfr.Document.body.scrollHeight;
if (currentfr.addEventListener)
currentfr.addEventListener("load", readjustIframe, false)
else if (currentfr.attachEvent){
currentfr.detachEvent("onload", readjustIframe) // Bug fix line
currentfr.attachEvent("onload", readjustIframe)
}
}
}

function readjustIframe(loadevt) {
var crossevt=(window.event)? event : loadevt
var iframeroot=(crossevt.currentTarget)? crossevt.currentTarget : crossevt.srcElement
if (iframeroot)
resizeIframe(iframeroot.id);
}

function loadintoIframe(iframeid, url){
if (document.getElementById)
document.getElementById(iframeid).src=url
}

if (window.addEventListener)
window.addEventListener("load", resizeCaller, false)
else if (window.attachEvent)
window.attachEvent("onload", resizeCaller)
else
window.onload=resizeCaller

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
</script>
<style type="text/css">
<!--
body {
	background-color: #E6E7DF;
	margin-top: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {font-size: 10px}
-->
</style>
</head>

<body onload="MM_preloadImages('grafica/menu/inicio_on.jpg','grafica/menu/quienes_somos_on.jpg','grafica/menu/clientes_on.jpg','grafica/menu/servicios_on.jpg','grafica/menu/cursos_on.jpg','grafica/menu/contacto_on.jpg')">
<table width="685" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="86" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="8" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13%"><a href="home.php" target="framehome" onmouseover="MM_swapImage('Inicio','','grafica/menu/inicio_on.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="grafica/menu/inicio_off.jpg" alt="Inicio" width="104" height="41" id="Inicio" /></a></td>
        <td width="13%"><a href="quienes_somos.php" target="framehome" onmouseover="MM_swapImage('Nosotros','','grafica/menu/quienes_somos_on.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="grafica/menu/quienes_somos_off.jpg" alt="Nosotros" width="104" height="41" id="Nosotros" /></a></td>
        <td width="13%"><a href="clientes.php" target="framehome" onmouseover="MM_swapImage('Clientes','','grafica/menu/clientes_on.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="grafica/menu/clientes_off.jpg" alt="Clientes" width="104" height="41" id="Clientes" /></a></td>
        <td width="13%"><a href="servicios.php" target="framehome" onmouseover="MM_swapImage('Servicios','','grafica/menu/servicios_on.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="grafica/menu/servicios_off.jpg" alt="Servicios" width="104" height="41" id="Servicios" /></a></td>
        <td width="13%"><a href="cursos.php" target="framehome" onmouseover="MM_swapImage('Cursos','','grafica/menu/cursos_on.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="grafica/menu/cursos_off.jpg" alt="cursos.php" width="104" height="41" id="Cursos" /></a></td>
        <td width="13%"><a href="contactenos.php" target="framehome" onmouseover="MM_swapImage('Contacto','','grafica/menu/contacto_on.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="grafica/menu/contacto_off.jpg" alt="Contacto" width="104" height="41" id="Contacto" /></a></td>
        <td width="22%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7"><img src="grafica/menu.jpg" width="800" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="235" align="center" valign="top" ><table width="235" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="358" height="181" valign="top" background="grafica/inicio_sesion.jpg"><?php if ($_SESSION["$nusuario"] == ""){ ?>
          <form id="form2" name="form1" method="post" action="index.php">
            <table width="84%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" height="40">&nbsp;</td>
                <td width="3%">&nbsp;</td>
                <td width="56%">&nbsp;</td>
              </tr>
              <tr>
                <td class="Letra1_blanca"><div align="right">Usuario</div></td>
                <td>&nbsp;</td>
                <td><label>
                  <input name="nusuario_txt" type="text" class="Contenidonegro" id="nusuario_txt" size="15" />
                </label></td>
              </tr>
              <tr>
                <td height="5" colspan="3"></td>
              </tr>
              <tr>
                <td class="Letra1_blanca"><div align="right">Password</div></td>
                <td>&nbsp;</td>
                <td><input name="password_txt" type="password" class="Contenidonegro" id="password_txt" size="15" /></td>
              </tr>
              <tr>
                <td height="5" colspan="3"></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center">
                  <label>
                    <input name="Entrar" type="submit" class="botones" id="Entrar" value="Entrar" />
                  </label>
                </div></td>
              </tr>
              <tr>
                <td height="4" colspan="3"></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><a href="recordarcontrase.php" target="framehome" class="Letra1_blanca">RECORDAR CONTRASE&Ntilde;A</a></div></td>
              </tr>
            </table>
          </form>
          <?php } else { 
		  	$listado = "select * from usuario where usuario  = '$_SESSION[$nusuario]'  ";
			$sentencia = mysql_query($listado,$conn);
			if($rs=mysql_fetch_array($sentencia,$mibase)){
				$perfil = $rs["perfil"];
			}
		  	if ($perfil=="empresa"){ ?>
          <table width="84%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="41%" height="66">&nbsp;</td>
              <td width="3%">&nbsp;</td>
              <td width="56%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="Letra1_blanca"><div align="center"><a href="admin/detalleempresa.php" target="framehome" class="Letra1_blanca">IR AL SISTEMA</a></div>
                <label></label></td>
            </tr>
            <tr>
              <td height="5" colspan="3"></td>
            </tr>
            <tr>
              <td colspan="3" class="Letra1_blanca"><div align="center"><a href="cambiarpassword.php" target="framehome" class="Letra1_blanca">CAMBIAR PASSWORD</a></div>
                <div align="left"></div>
                <div align="left"></div></td>
            </tr>
            <tr>
              <td height="5" colspan="3"></td>
            </tr>
            <tr>
              <td height="5" colspan="3"><div align="center"><a href="index.php?fun=cerrar" class="Letra1_blanca">CERRAR SESION</a></div></td>
            </tr>
          </table>
         
            <?php } if ($perfil=="admin"){ ?>
      
          <table width="84%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="41%" height="66">&nbsp;</td>
              <td width="3%">&nbsp;</td>
              <td width="56%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="Letra1_blanca"><div align="center"><a href="admin/sesion.php" target="framehome" class="Letra1_blanca">IR AL SISTEMA</a></div>
                <label></label></td>
            </tr>
            <tr>
              <td height="5" colspan="3"></td>
            </tr>
            <tr>
              <td colspan="3" class="Letra1_blanca"><div align="center"><a href="cambiarpassword.php" target="framehome" class="Letra1_blanca">CAMBIAR PASSWORD</a></div>
                <div align="left"></div>
                <div align="left"></div></td>
            </tr>
            <tr>
              <td height="5" colspan="3"></td>
            </tr>
            <tr>
              <td height="5" colspan="3"><div align="center"><a href="index.php?fun=cerrar" class="Letra1_blanca">CERRAR SESION</a></div></td>
            </tr>
          </table>
          <?php } }?>
          <p>&nbsp; </p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="left" class="Titulo">CATEGORIAS</div></td>
          </tr>
          <tr>
            <td height="27" class="Titulo Estilo1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="13%"><img src="grafica/item.jpg" width="15" height="14" />&nbsp;</td>
                <td width="87%" align="left">FICHA PERSONAL</td>
              </tr>
              <tr>
                <td colspan="2"><img src="grafica/linea.jpg" width="212" height="2" /></td>
              </tr>
              <tr>
                <td><img src="grafica/item.jpg" width="15" height="14" />&nbsp;</td>
                <td align="left">ASISTENCIA</td>
              </tr>
              <tr>
                <td colspan="2"><img src="grafica/linea.jpg" width="212" height="2" /></td>
              </tr>
              <tr>
                <td><img src="grafica/item.jpg" width="15" height="14" />&nbsp;</td>
                <td align="left">CARGOS PERSONALES</td>
              </tr>
              <tr>
                <td colspan="2"><img src="grafica/linea.jpg" width="212" height="2" /></td>
              </tr>
              <tr>
                <td><img src="grafica/item.jpg" width="15" height="14" />&nbsp;</td>
                <td align="left">FICHA PERSONAL</td>
              </tr>
              <tr>
                <td colspan="2"><img src="grafica/linea.jpg" width="212" height="2" /></td>
              </tr>
              <tr>
                <td><img src="grafica/item.jpg" width="15" height="14" />&nbsp;</td>
                <td align="left">INCIDENTES</td>
              </tr>
              <tr>
                <td colspan="2"><img src="grafica/linea.jpg" width="212" height="2" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="left"><div align="center" class="Contenidonegro"></div></td>
      </tr>
    </table></td>
    <td width="565" rowspan="7" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><iframe id="foro" src="home.php" name="framehome" width="565" style=" scrolling="auto="Auto"" frameborder="0" allowtransparency="true"filter:="FILTER:" 
chroma(color="#FFFFFF)&quot;" ></iframe></td>
      </tr>
      <tr>
        <td align="right"><span class="Contenidonegro"><a href="http://www.emagenic.cl" target="new" class="Contenidonegro">Sitio web desarrollado por Emagenic</a></span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
