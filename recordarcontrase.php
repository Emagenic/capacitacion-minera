<?php
include("Conexion.php");
if ($_POST["Enviar"]){
	$listado = "select * from usuario where correo  = '$_POST[correo]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rss=mysql_fetch_array($sentencia,$mibase)){
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		// ENVIO DE CORREO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$password = $rss["password"];
		$destinatario = $_POST["correo"]; 
$asunto = "Recuperacion de password"; 
$cuerpo = "
<table width=500 border=0 align=center cellpadding=0 cellspacing=0><tr><td width=320><span class=Estilo2>RECUPERACION DE CONTRASEÑA</span></td>  </tr>  <tr>    <td>&nbsp;</td>  </tr>  <tr>    <td valign=top class=Estilo2>Buen día, se ha solicitado la recuperación de su password de SGPR desde la IP: <strong>".$_SERVER['REMOTE_ADDR'].". 
</strong>Su password es <strong>".$password."</strong>,y su nombre de usuario es <strong>".$rss["usuario"]."</strong></td> </tr>
  <tr>
    <td valign=top class=Estilo2>&nbsp;</td>
  </tr>
  <tr>
    <td valign=top class=Estilo2><div align=center><img src=http://www.emagenic.cl/grafica/logo.png width=270 height=89 /></div></td>
  </tr>
</table>";

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: Sistema de recuperacion de password <webmaster@emagenic.cl>\r\n"; 
//direcciones que recibirán copia oculta 

mail($destinatario,$asunto,$cuerpo,$headers);	
header("location: postrecuperacion.php","_self");	
	}
	else
	{
		echo "<p align=center class=Subtitulo2>Este correo no esta registrado en nuestro sistema </p>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="Author" content="Matias Seguel Miranda">
		<meta name="country" content="Chile">
		<meta name="language" content="spanish">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title></title>
		<style type="text/css">
		<!--
		-->
    	</style>
		<link href="letras.css" rel="stylesheet" type="text/css">
        <style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo5 {color: #FFFFFF}
.Estilo7 {	color: #FF9933
}
.Estilo8 {color: #FF6600}
.Estilo9 {font-size: 10px}
.Estilo10 {color: #FF6600; text-transform: uppercase; }
.Estilo2 {	color: #333333;
	font-weight: bold;
}
-->
        </style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>

<script language="JavaScript">
<!--
<!-- 
function openWindow(url, name) {
popupWin = window.open(url, name, 'scrollbars,resizable,width=445,height=495')
}

// -->

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
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
</script>
    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>
              <form action="recordarcontrase.php" method="post" name="form1" onSubmit="MM_validateForm('correo','','RisEmail');return document.MM_returnValue">
                <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="448" class="Titulo">RECORDAR CONTRASE&Ntilde;A</td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td valign="top"><p align="center" class="Contenidonegro">Ingrese su correo </p></td>
                    </tr>
                  <tr>
                    <td valign="top"><div align="center">
                      <input name="correo" type="text" id="correo" size="50" />
                    </div></td>
                  </tr>
                  <tr>
                    <td valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="center">
                      <input name="Enviar" type="submit" id="Enviar" value="Consultar" />
                    </div></td>
                  </tr>
                </table>
 
                </form>
        </td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
