<?php
session_start();
include("../Conexion.php");
if ($_POST["grabarasesoria"]){ // Graba el nuevo usuario
	$insertar="INSERT INTO empresas (region, comuna,rut,nombre ,web,direccion ,giro ,fonoempresa, mailempresa, contactosistema, fonocontactosistema, mailcontactosistema ) ";
	$insertar.= "VALUES( '$_POST[region]','$_POST[comuna]','$_POST[rut]', '$_POST[nombre]' , '$_POST[web]', '$_POST[direccion]' , '$_POST[giro]' , '$_POST[fonoempresa]', '$_POST[mailempresa]', '$_POST[contactosistema]', '$_POST[fonocontactosistema]', '$_POST[mailcontactosistema]')";
	$sentencia=mysql_query($insertar,$conn)or die("Error al grabar un mensaje: ".mysql_error);
	header("location: empresas.php");
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
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>



    </head>
<body>
<div align="center">
  <p><span class="Titulo">Registro de empresa</span></p>
</div>
<form action="agregar_empresa.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('usuario','','R','nombre','','R','password','','R','repassword','','R','telefono','','R','mail','','RisEmail');return document.MM_returnValue">
  <table width="500"  border="0" align="center" cellpadding="0" cellspacing="0">
   <?php
    $listado = "select * from usuario where usuario  = '$_GET[rut]'  ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
		$rut =$_GET["rut"];
		$nombre =$rs["nombre"];
	}
   ?>
   
   
    <tr>
      <td class="Contenidonegro" align="right">Rut de la empresa:&nbsp;</td>
      <td width="40%"><div align="left" class="Contenidonegro"><?php echo $rut; ?>
        <input name="rut" type="hidden" id="rut" value="<?php echo $rut; ?>" />
      </div></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Razon social:&nbsp;</td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="Contenidonegro"><?php echo $nombre; ?>
              <input name="nombre" type="hidden" id="nombre" value="<?php echo $nombre; ?>" /></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Region:&nbsp;</td>
      <td>
      <select name="region" class="Contenidonegro" id="primerCombo" onchange="SeleccionandoCombo(this, 'segundoCombo');">
	        <option value="">Seleccione region</option>
			<?php 
    $listado = "select * from region ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
	
    <option value="<?php echo $rs["IDregion"]; ?>"><?php echo $rs["Nombreregion"]; ?></option>
<?php } ?>
</select></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Comuna:&nbsp;</td>
      <td><select name="comuna" class="Contenidonegro" id="segundoCombo"></select>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function LimpiarCombo(combo){
	while(combo.length > 0){
		combo.remove(combo.length-1);
	}
}
function LlenarCombo(json, combo){
	combo.options[0] = new Option('Selecciona un item', '');
	for(var i=0;i<json.length;i++){
		combo.options[combo.length] = new Option(json[i].data, json[i].id);
	}
}
function SeleccionandoCombo(combo1, combo2){
	combo2 = document.getElementById(combo2); //con jquery: $("#"+combo2)[0];
	LimpiarCombo(combo2);
	if(combo1.options[combo1.selectedIndex].value != ""){
		combo1.disabled = true;
		combo2.disabled = true;
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: 'ajax.php',
			data: {valor: combo1.options[combo1.selectedIndex].value},
			success: function(json){
				LlenarCombo(json, combo2);
				combo1.disabled = false;
				combo2.disabled = false;
			}
		});
	}
}
</script></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Direccion:&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left"><label>
            <input name="direccion" type="text" class="Contenidonegro" id="direccion" size="40" maxlength="1000" />
          </label></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="60%" class="Contenidonegro" align="right">Giro:&nbsp;</td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="giro" type="text" class="Contenidonegro" id="giro" size="40" maxlength="1000" /></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Tel&eacute;fono:&nbsp;</td>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="fonoempresa" type="text" class="Contenidonegro" id="fonoempresa" size="20" maxlength="1000" /></td>
          </tr>
        </table>
      </div>
          <label></label>      </td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Pagina web:&nbsp;</td>
      <td><input name="web" type="text" class="Contenidonegro" id="web" size="40" maxlength="1000" /></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Mail:&nbsp;</td>
      <td><input name="mailempresa" type="text" class="Contenidonegro" id="mailempresa" size="40" maxlength="1000" /></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Contacto para sistema:&nbsp;</td>
       
       <td><input name="contactosistema" type="text" class="Contenidonegro" id="contactosistema" size="40" maxlength="1000" /></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Tel&eacute;fono contacto sistema:&nbsp;</td>
      <td><input name="fonocontactosistema" type="text" class="Contenidonegro" id="fonocontactosistema" size="20" maxlength="1000" /></td>
    </tr>
    <tr>
      <td class="Contenidonegro" align="right">Mail  contacto sistema:&nbsp;</td>
      <td><input name="mailcontactosistema" type="text" class="Contenidonegro" id="mailcontactosistema" size="40" maxlength="1000" /></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="grabarasesoria" type="submit" class="botones" id="grabarasesoria" value="Grabar" />
      </div></td>
    </tr>
  </table>
</form>

</body>
</html>
