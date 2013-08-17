<?php
if ($_POST["Enviar"]){
	$destinatario = "mseguelm@emagenic.cl";
	$nombre = $_POST["Nombre"];
	$telefono = $_POST["Telefono"];
	$mail = $_POST["Email"];
	$consulta = $_POST["Consulta"];
	$asunto = "Consulta SGPR"; 
	$cuerpo = "<table width=100% border=1 cellspacing=0 cellpadding=0><tr><td>NOMBRE: $nombre</td></tr><tr><td>TELEFONO: $telefono</td></tr><tr><td>MAIL: $mail</td></tr><tr><td>CONSULTA: $consulta</td></tr></table>";
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: $nombre <$mail>\r\n"; 
	mail($destinatario,$asunto,$cuerpo,$headers);
	header("location: postconsulta.php","_self");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="letras.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body class="Letras3">
<form action="contactenos.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('Nombre','','R','Telefono','','R','Email','','RisEmail','Consulta','','R');return document.MM_returnValue">
  <table width="480" height="60" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="43%" height="20" class="Subtitulo2"></noscript>
      <span class="Titulo">CONTACTENOS</span></td>
    </tr>
    <tr>
      <td height="20" class="Subtitulo2">&nbsp;</td>
    </tr>
    <tr>
      <td height="20" class="Contenidonegro">Su consulta se ha enviado correctamente, pronto nos pondremos en contacto con usted.</td>
    </tr>
  </table>
</form>
</body>
</html>
