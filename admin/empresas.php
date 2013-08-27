<?php
session_start();
include("../Conexion.php"); 
if ($_GET["fun"]=="eli"){
	$editar="update  empresas set act  = 'no' where rut = '$_GET[rut]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
	$editar="update  usuario set activa  = 'no' where usuario = '$_GET[rut]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}

if ($_POST["Modificar"]){
	$editar="update empresas  set giro   = '$_POST[giro]', region   = '$_POST[region_combo]', comuna   = '$_POST[comuna_combo]', direccion   = '$_POST[direccion]',fonoempresa = '$_POST[telefono]' , web   = '$_POST[web]', mailempresa   = '$_POST[mail]'  where rut = '$_GET[rut]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al modificar la empresa ".mysql_error);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script type="text/javascript">
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
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>

</head>

<body>
<p align="center" class="Titulo">Empresas contratadas</p>
<p align="center" class="Titulo">
  <?php
  if ($_GET["act"]=="edi"){
  
  	$listado = "select * from empresas where rut = '$_GET[rut]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
</p>
<form action="empresas.php?rut=<?php echo $_GET["rut"]; ?>" method="post" name="form1" id="form1" onsubmit="MM_validateForm('giro','','R','direccion','','R','telefono','','R','web','','R','mail','','R');return document.MM_returnValue">
  <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="104" height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td width="6" bgcolor="#333333" class="Contenidonegro"></td>
      <td width="370" bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    
    <tr>
      <td class="Contenidonegro"><div align="right">Rut: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left"><?php echo $rs["rut"]; ?></div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    
        <tr>
      <td class="Contenidonegro"><div align="right">Nombre: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left"><?php echo $rs["nombre"]; ?></div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    
    <tr>
      <td class="Contenidonegro"><div align="right">Giro: </div>
        <label></label>
        <div align="right"></div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left">
        <input name="giro" type="text" class="Contenidonegro" id="giro" value="<?php echo $rs["giro"]; ?>" size="40" />
      </div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td class="Contenidonegro"><div align="right">Reg&iacute;on: </div>
        <label></label>
        <div align="right"></div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left">
        <select name="region_combo" class="Contenidonegro" id="primerCombo" onchange="SeleccionandoCombo(this, 'segundoCombo');">
          <?php 
    $listadoss = "select * from region where IDregion ='$rs[region]' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
          <option value="<?php echo $rss["IDregion"]; ?>"><?php echo $rss["Nombreregion"]; ?></option>
          <?php 
	}
    $listadoss = "select * from region ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
          <option value="<?php echo $rss["IDregion"]; ?>"><?php echo $rss["Nombreregion"]; ?></option>
          <?php } ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td class="Contenidonegro"><div align="right">Comuna: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro">
      <div align="left">
          <select name="comuna_combo" class="Contenidonegro" id="segundoCombo">
          
               <?php 
    $listadoss = "select * from comuna where id ='$rs[comuna]' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
            <option value="<?php echo $rss["id"]; ?>"><?php echo $rss["comuna"]; ?></option>
            <?php } ?>
          
          </select>
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
</script>
        </div>
      
      </td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#716F64" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td class="Contenidonegro"><div align="right">Direcci&oacute;n: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left">
        <input name="direccion" type="text" class="Contenidonegro" id="direccion" value="<?php echo $rs["direccion"]; ?>" size="40" />
      </div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td class="Contenidonegro"><div align="right">Tel&eacute;fono: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left">
        <input name="telefono" type="text" class="Contenidonegro" id="telefono" value="<?php echo $rs["fonoempresa"]; ?>" size="20" />
     </div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td class="Contenidonegro"><div align="right">P&aacute;gina web: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left">
        <input name="web" type="text" class="Contenidonegro" id="web" value="<?php echo $rs["web"]; ?>" size="40" />
      </div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td class="Contenidonegro"><div align="right">Mail: </div></td>
      <td class="Contenidonegro"><div align="left"></div></td>
      <td class="Contenidonegro"><div align="left">
        <input name="mail" type="text" class="Contenidonegro" id="mail" value="<?php echo $rs["mailempresa"]; ?>" size="40" />
      </div></td>
    </tr>
    <tr>
      <td height="2" bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
      <td bgcolor="#333333" class="Contenidonegro"></td>
    </tr>
    <tr>
      <td height="2" colspan="3" class="Contenidonegro">&nbsp;</td>
    </tr>
    <tr>
      <td height="2" colspan="3" class="Contenidonegro"><div align="center">
        <label>
          <input type="submit" name="Modificar" id="Modificar" value="Modificar" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<p>
  <?php }} ?>
</p>
<p>
</p>
</p>
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td width="60" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Eliminar</div></td>
    <td width="60" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Editar</div></td>
    <td width="119" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Rut</div></td>
    <td width="348" bgcolor="#FF9900" class="Letra1_blanca">Nombre</td>
    <td width="269" bgcolor="#FF9900" class="Letra1_blanca">Mail</td>
  </tr>
  <?php
  	$listado = "select * from empresas where act = 'si' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td class="Contenidonegro"><div align="center"><a href="empresas.php?rut=<?php echo $rs["rut"]; ?>&amp;fun=eli" onClick=" return confirm('Está seguro que desea eliminar?');"><img src="b_drop.png" width="16" height="16" border="0" /></a></div></td>
    <td class="Contenidonegro"><div align="center"><a href="empresas.php?rut=<?php echo $rs["rut"]; ?>&amp;act=edi"><img src="Lapiz.png" width="16" height="16" border="0" /></a></div></td>
    <td class="Contenidonegro"><div align="center"><?php echo $rs["rut"]; ?></div></td>
    <td class="Contenidonegro"><a href="detalleempresa.php?rut=<?php echo $rs["usuario"]; ?>" class="Contenidonegro"><?php echo $rs["nombre"]; ?></a></td>
    <td class="Contenidonegro"><a href="mailto: <?php echo $rs["mailcontactosistema"]; ?>" class="Contenidonegro"><?php echo $rs["mailempresa"]; ?></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="5" class="Menu1">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="Contenidonegro"><a href="agregar_usuario_empresa.php" class="Menu1">AGREGAR EMPRESA</a></td>
  </tr>
</table>
</body>
</html>
