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

<body>
<table width="685" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="86" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><img src="grafica/menu.jpg" width="800" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="8" colspan="2"></td>
  </tr>
  <tr>
    <td width="235" align="center" valign="top" ><table width="235" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="358" height="181" valign="top" background="grafica/inicio_sesion.jpg"><?php if ($_SESSION["$nusuario"] == ""){ ?>
          <form id="form2" name="form1" method="post" action="index.php">
            <table width="84%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" height="66">&nbsp;</td>
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
          <?php } else { if ($perfil=="empresa"){ ?>
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
                <td align="left">CAPACITACIONES</td>
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
        <td bgcolor="#474C52"><img src="grafica/emagenic.png" width="235" height="79" /></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#474C52"><a href="http://www.emagenic.cl" target="_blank" class="Menu1">Ver mas</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center"><a href="http://twitter.com/emagenic" target="_blank"><img src="grafica/twitter.jpg" width="61" height="23" border="0" /></a></div></td>
      </tr>
    </table></td>
    <td width="565" rowspan="7" align="center" valign="top"><iframe id="foro" src="home.php" name="framehome" width="565" style=" scrolling="auto="Auto"" frameborder="0" allowtransparency="true"filter:="FILTER:" 
chroma(color="#FFFFFF)&quot;" ></iframe></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="572,10,662,36" href="contactenos.php" target="framehome" />
  <area shape="rect" coords="453,7,552,36" href="objetivos.php" target="framehome" />
  <area shape="rect" coords="345,7,438,36" href="planes.php" target="framehome" />
  <area shape="rect" coords="234,8,324,35" href="clientes.php" target="framehome" />
  <area shape="rect" coords="115,9,218,35" href="quienes_somos.php" target="framehome" />
  <area shape="rect" coords="11,6,97,38" href="home.php" target="framehome" />
</map>
</body>
</html>
