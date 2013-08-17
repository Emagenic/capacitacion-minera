<?php
if ($_POST["Enviar"]){

	include_once("securimage/securimage.php");
	$img = new securimage();
	$valido_captcha = $img->check($_POST['captchacode']);

if ($valido_captcha){

	$destinatario = "nicolas.calderon@novaproject.cl";
	$nombre = $_POST["Nombre"];
	$telefono = $_POST["Telefono"];
	$mail = $_POST["Email"];
	$consulta = $_POST["Consulta"];
	$asunto = "Consulta sitio web"; 
	$cuerpo = "<table width=100% border=1 cellspacing=0 cellpadding=0><tr><td>NOMBRE: $nombre</td></tr><tr><td>TELEFONO: $telefono</td></tr><tr><td>MAIL: $mail</td></tr><tr><td>CONSULTA: $consulta</td></tr></table>";
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: $nombre <$mail>\r\n"; 
	mail($destinatario,$asunto,$cuerpo,$headers);
	header("location: postconsulta.php","_self");
}else{
   echo "Consulta no enviada, debe escribir correctamente el codigo de seguridad";
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>E-magenic - soluciones creativas</title>
<meta name="google-site-verification" content="k5znj7KDl6ggSa82bzzF3iOX0i593y2vqJKjLeYx3o0" />
<style type="text/css">
<!--
body {
	background-image: url();
}
.Estilo3 {font-size: 9px}
-->
</style>

<script language="JavaScript">
<!--
<!-- 
function openWindow(url, name) {
popupWin = window.open(url, name, 'scrollbars,resizable,width=470,height=560')
}
// -->
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
<form action="contactenos.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('Nombre','','R','Telefono','','R','Email','','RisEmail','captchacode','','R','Consulta','','R');return document.MM_returnValue">
  <table width="550" height="180" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    
    <tr>
      <td width="39%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" class="Contenidonegro">Nombre</td>
        </tr>
        <tr>
          <td align="center"><label>
            <input name="Nombre" type="text" class="Contenidonegro" id="Nombre" size="40" />
          </label></td>
        </tr>
        <tr>
          <td height="5" align="center"></td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">Tel&eacute;fono</td>
        </tr>
        <tr>
          <td align="center"><input name="Telefono" type="text" class="Contenidonegro" id="Telefono" size="40" /></td>
        </tr>
        <tr>
          <td height="5" align="center"></td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">Mail</td>
        </tr>
        <tr>
          <td align="center"><input name="Email" type="text" class="Contenidonegro" id="Email" size="40" /></td>
        </tr>
        <tr>
          <td height="5" align="center"></td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">Consulta</td>
        </tr>
        <tr>
          <td align="center"><textarea name="Consulta" cols="40" rows="10" class="Contenidonegro" id="Consulta"></textarea></td>
        </tr>
        <tr>
          <td height="5" align="left"></td>
        </tr>
        <tr>
          <td align="center"><img src="/securimage/securimage_show.php" name="captcha" id="captcha" /></td>
        </tr>
        <tr>
          <td align="left"><div align="center"><a href="#" class="Menu1" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">Refrescar la imagen</a></div></td>
        </tr>
        <tr>
          <td align="left"><div align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45%" align="right" class="Contenidonegro">Codigo:</td>
                <td width="55%"><div align="left">
                  <input name="captchacode" type="text" class="Contenidonegro" id="captchacode" />
                </div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><div align="center">
            <input name="Enviar" type="submit" class="botones" id="Enviar" value="Enviar" />
          </div></td>
        </tr>
      </table></td>
      <td width="1%">&nbsp;</td>
      <td width="60%" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left"><div align="center" class="Contenidonegro">Guardia Vieja 255 Oficina 1112 Providencia Santiago</div></td>
        </tr>
        <tr>
          <td align="center"><span class="Contenidonegro">Telefono: 02 - 23310311</span></td>
        </tr>
        <tr>
          <td align="center"><span class="Contenidonegro">Novaproject Ingenieria en Gest&iacute;on</span></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><div align="center" class="Contenidonegro">San Martin 571 Oficina 6, Rancagua   Chile</div></td>
        </tr>
        <tr>
          <td align="left"><div align="center"><span class="Contenidonegro">Telefono: 072 - 768341</span></div></td>
        </tr>
        <tr>
          <td align="left"><div align="center" class="Contenidonegro">Novaproject Ingenieria en Gest&iacute;on</div></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">contacto@prevencionriesgos.cl</td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">prevencionriesgos@novaproject.cl</td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">Moviles: 5401 5291 - 9074 8650</td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">Gerente de proyectos</td>
        </tr>
        <tr>
          <td align="center" class="Contenidonegro">Nicol&aacute;s Calderon.</td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
