<?php
session_start();
include("../Conexion.php");
if ($_POST["Grabar"]){ // Graba el nuevo usuario
			$usuario = $_POST["usuario"];
			$nombre = $_POST["nombre"];
			$password = $_POST["password"];
			$repassword = $_POST["repassword"];	
			$correo = $_POST["mail"];
			$telefono =$_POST["telefono"];
			$activa ="no";
			$club ="empresa";
			$listado = "select * from usuario where usuario = '$usuario'  ";
			$sentencia = mysql_query($listado,$conn);
			if($rs=mysql_fetch_array($sentencia,$mibase)){
			  	$usuarioencontrado ="si";
			}
			$listado = "select * from usuario where correo = '$correo' ";
			$sentencia = mysql_query($listado,$conn);
			if($rs=mysql_fetch_array($sentencia,$mibase)){
				$correoencontrado ="si";
			}
			if ($password <> $repassword){

			} elseif ($usuarioencontrado =="si") {
		
			}elseif ($correoencontrado =="si"){

			}else { 
				$password = md5($password);
				$insertar="INSERT INTO usuario (usuario,nombre ,password,correo ,activa ,telefono,perfil ) ";
				$insertar.= "VALUES( '$usuario','$nombre','$password','$correo','$activa',$telefono,'$club')";
				$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
				//************************** ENVIO DE CORREO ELECTRONICO ***********************************
				$destinatario = $_POST["mail"]; 
				$asunto = "Activacion de cuenta SGPR"; 
				$cuerpo ="<html><head><meta http-equiv=Content-Type content=text/html; charset=iso-8859-1 /><title>REGISTRO DE EMPRESAS</title><style type=text/css><!--.Estilo2 {	font-family: Verdana;	font-size: 16px;}.Estilo4 {	font-family: Verdana;	font-size: 12px;}--></style></head><body><table width=600 border=0 cellspacing=0 cellpadding=0><tr><td width=170 rowspan=4><img src=http://www.emagenic.cl/imagenes/logo.jpg width=200  /></td><td width=430><span class=Estilo2>MUY BUEN DIA</span></td></tr><tr><td><span class=Estilo4>SU EMPRESA HA SIDO REGISTRADA EN EL SISTEMA DE GESTION PARA LA PREVENCION DE RIESGOS, EN UN PERIODO NO SUPERIOR A 48 HRS SE CREARAN SUS PERFILES Y PODRA UTILIZAR LA PLATAFORMA.</span></td></tr><tr><td>&nbsp;</td></tr><tr><td><div align=center><span class=Estilo4><a href=http://www.prevencionriesgos.cl/activarcuenta.php?f=act&mail=$_POST[mail]>PARA ACTIVAR SU CUENTA HAGA CLIC ACA</a></span></div></td></tr></table></body></html>";
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			//direcci?n del remitente 
			$headers .= "From: Sistema de Registro <webmaster@emagenic.cl>\r\n"; 
			//direcciones que recibir?n copia oculta 
			mail($destinatario,$asunto,$cuerpo,$headers);	
				// fin de envio de correo	
			header("location: agregar_empresa.php?rut=$usuario");
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
		<link href="../letras.css" rel="stylesheet" type="text/css">
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
<script language="JavaScript" type="text/JavaScript">
<!--
function chk_usuario(){
var pos_url = 'compruebauser.php';
var nombre = document.getElementById('usuario').value;
var req = new XMLHttpRequest();
if (req) {
req.onreadystatechange = function() {
if (req.readyState == 4 && (req.status == 200 || req.status == 304)) {
document.getElementById('resultado').innerHTML = req.responseText;
}
}
req.open('GET', pos_url +'?nombre='+nombre,true);
req.send(null);
}
}

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



    </head>
<body>
<div align="center">
  <p><span class="Titulo">Registro de usuario empresa</span></p>
  <p>
    <?php
		if ($_POST["Grabar"]){ // Graba el nuevo usuario		
			$listado = "select * from usuario where usuario = '$_POST[usuario]'  ";
			$sentencia = mysql_query($listado,$conn);
			if($rs=mysql_fetch_array($sentencia,$mibase)){
			  	$usuarioencontrado ="si";
			}
			$listado = "select * from usuario where correo = '$_POST[mail]' ";
			$sentencia = mysql_query($listado,$conn);
			if($rs=mysql_fetch_array($sentencia,$mibase)){
				$correoencontrado ="si";
			}
			if ($_POST["password"] <> $_POST["repassword"]){
				echo "<p class=Contenidonegro>no repitio correctamente la password, vuelva a intentarlo</p>";
			} elseif ($usuarioencontrado =="si") {
				echo "<p class=Contenidonegro>El usuario que escribio ya esta registrado, indique otro.</p>";			
			}elseif ($correoencontrado =="si"){
				echo "<p class=Contenidonegro>El correo que escribio ya esta registrado en nuestro sistema, si usted es el propietario intente recuperarlo ";
				echo "<a href=recordarcontrase.php>aca</a>.</p> ";
			}else { 
				
			}
		}			  
			  ?>
    </p>
</div>
<form action="agregar_usuario_empresa.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('usuario','','R','nombre','','R','password','','R','repassword','','R','telefono','','R','mail','','RisEmail');return document.MM_returnValue">
  <table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td class="Contenidonegro" align="left">Rut de la empresa</td>
      <td><div align="left">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="Letras2">
          <tr>
            <td width="15%"><input name="usuario" type="text" class="Contenidonegro" id="usuario" onkeyup="chk_usuario();" maxlength="12"/></td>
            <td width="85%"><div id='resultado'></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="left">Razon social</td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="nombre" type="text" class="Contenidonegro" id="nombre" size="45" maxlength="1000" /></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="left">Password</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left"><input name="password" type="password" class="Contenidonegro" id="password" size="12" maxlength="15" />
          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="26%" class="Contenidonegro" align="left">Repita Password</td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="repassword" type="password" class="Contenidonegro" id="repassword" size="12" maxlength="15" /></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="left">Telefono</td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="telefono" type="text" class="Contenidonegro" id="telefono" maxlength="50" /></td>
          </tr>
        </table>
      </div>
          <label></label>
      </td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="left">E-mail</td>
      <td width="74%"><div align="left">
        <input name="mail" type="text" class="Contenidonegro" id="mail" onkeyup="chk_mail();" size="45" maxlength="1000"/>
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="Grabar" type="submit" class="botones" id="Grabar" value="Grabar" />
      </div></td>
    </tr>
  </table>
</form>

</body>
</html>
