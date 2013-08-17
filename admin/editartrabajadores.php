<?php
session_start();
include("../Conexion.php");
if ($_POST["Modificar"]){
	$fecha_ocupacional = $_POST["ano4"]."-".$_POST["mes4"]."-".$_POST["dia4"];
	$fecha_ocupacional2 = $_POST["ano2"]."-".$_POST["mes2"]."-".$_POST["dia2"];
	$fecha_ingreso = $_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
	$fecha_nacimiento = $_POST["ano3"]."-".$_POST["mes3"]."-".$_POST["dia3"];
	$editar="update  trabajador set 
	empresa='$_SESSION[$nusuario]', 
	rut='$_POST[rut]', 
	nombre='$_POST[nombre]', 
	ecivil='$_POST[ecivil]', 
	nacimiento='$fecha_nacimiento', 
	fonofijo='$_POST[fonofijo]', 
	celular='$_POST[celular]', 
	mail='$_POST[mail]', 
	region='$_POST[region]', 
	comuna='$_POST[comuna]', 
	direccion='$_POST[direccion]', 
	fecha_ocupacional='$fecha_ocupacional', 
	fecha_ocupacional2='$fecha_ocupacional2', 
	obra='$_POST[obra]', 
	cargo='$_POST[cargo]', 
	sueldo='$_POST[sueldo]', 
	fecha_ingreso='$fecha_ingreso',
	previcion='$_POST[previcion]',
	pensionado='$_POST[pensionado]', 
	salud='$_POST[salud]', 
	valorisapre='$_POST[valorisapre]', 
	fonoemergencias1='$_POST[fonoemergencias1]',
	nombreavisar1='$_POST[nombreavisar1]', 
	fonoemergencias2='$_POST[fonoemergencias2]',
	nombreavisar2='$_POST[nombreavisar2]',
	gruposanguineo='$_POST[gruposanguineo]',
	alergicoa='$_POST[alergicoa]',
	comentariosalud='$_POST[comentariosalud]',
	act='si'
	where rut = '$_POST[rut]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../letras.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe ser direccion de correo.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' debe ser numerico.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' debe ser numerico entre '+min+' y '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es obligatorio.\n'; }
    } if (errors) alert('Existen los siguientes errores:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<body>

<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><span class="Titulo">Editar trabajador</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="150" border="0" cellspacing="0" cellpadding="0">
    <?php 
    $listado = "select * from trabajador where rut ='$_GET[rut]' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
?>
      <tr>
        <td width="164" align="center"><a href="../imagenes/trabajadores/Upload_categoria.php?id=<?php echo $rs["rut"]; ?>" class="Titulo">Cambiar foto</a></td>
      </tr>
      <tr>
        <td><img src="../imagenes/trabajadores/<?php echo $rs["rut"]; ?>.png" width="150" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><a href="contratos/Upload_foto.php?id=<?php echo $rs["rut"]; ?>" class="Menu1">Actualizar contrato</a> 
    
    <?php if (file_exists("contratos/".$rs["rut"].".pdf")){ ?>
    
    - <a href="contratos/<?php echo $rs["rut"]; ?>.pdf" class="Menu1">Ver contrato</a>
    
    <?php } ?>
    </td>
  </tr>
  <tr>
    <td></p>

    
      <form name="Form" method="post" action="editartrabajadores.php?rut=<?php echo $_GET["rut"]; ?>">
        <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" bgcolor="#FF9900" class="Contenidonegro"><span class="Letra1_blanca">Datos personales
        <input name="rut" type="hidden" id="rut" value="<?php echo $rs["rut"]; ?>" />
      </span></td>
    </tr>
    <tr>
      <td width="38%" align="right" class="Contenidonegro">        Nombre:&nbsp;</td>
      <td width="62%"><div align="left">
        <input name="nombre" type="text" class="Contenidonegro" id="nombre" onkeyup="chk_usuario();" value="<?php echo $rs["nombre"]; ?>" size="40" maxlength="150"/>
        </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Estado civil:&nbsp;</td>
      <td><label for="ecivil"></label>
        <select name="ecivil" class="Contenidonegro" id="ecivil">
          
          <option value="<?php echo $rs["ecivil"]; ?>"><?php echo $rs["ecivil"]; ?></option>
          <option value="Soltero">Soltero</option>
          <option value="Casado">Casado</option>
          <option value="Viudo">Viudo</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">
	  <?php 
	  	$fecha = $rs["nacimiento"]; 
		list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
	  ?>
      Fecha de nacimiento:&nbsp;</td>
      <td><table width="15%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="left"></div></td>
          <td><select name="dia3" class="Contenidonegro" id="dia3">
            <option value="<?php echo $dia; ?>" selected="selected"><?php echo $dia; ?></option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select></td>
          <td><div align="left">
            <select name="mes3" class="Contenidonegro" id="mes3">
              <option value="<?php echo $mes; ?>" selected="selected"><?php echo $mes; ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div></td>
          <td><label>
            <select name="ano3" class="Contenidonegro" id="ano3">
              <option value="<?php echo $ano; ?>" selected="selected"><?php echo $ano; ?></option>
              <option value="1931">1931</option>
              <option value="1932">1932</option>
              <option value="1933">1933</option>
              <option value="1934">1934</option>
              <option value="1935">1935</option>
              <option value="1936">1936</option>
              <option value="1937">1937</option>
              <option value="1938">1938</option>
              <option value="1939">1939</option> 


              <option value="1941">1941</option>
              <option value="1942">1942</option>
              <option value="1943">1943</option>
              <option value="1944">1944</option>
              <option value="1945">1945</option>
              <option value="1946">1946</option>
              <option value="1947">1947</option>
              <option value="1948">1948</option>
              <option value="1949">1949</option>  

              <option value="1951">1951</option>
              <option value="1952">1952</option>
              <option value="1953">1953</option>
              <option value="1954">1954</option>
              <option value="1955">1955</option>
              <option value="1956">1956</option>
              <option value="1957">1957</option>
              <option value="1958">1958</option>
              <option value="1959">1959</option>                
              
              <option value="1961">1961</option>
              <option value="1962">1962</option>
              <option value="1963">1963</option>
              <option value="1964">1964</option>
              <option value="1965">1965</option>
              <option value="1966">1966</option>
              <option value="1967">1967</option>
              <option value="1968">1968</option>
              <option value="1969">1969</option>              
              
              <option value="1971">1971</option>
              <option value="1972">1972</option>
              <option value="1973">1973</option>
              <option value="1974">1974</option>
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              
              
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
            </select>
          </label></td>
          <td><div align="left"></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2" align="right" valign="top" bgcolor="#FF9900" class="Contenidonegro"><div align="center" class="Letra1_blanca">Datos de contacto</div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Telefono fijo:&nbsp;</td>
      <td><input name="fonofijo" type="text" class="Contenidonegro" id="fonofijo" onkeyup="chk_usuario();" value="<?php echo $rs["fonofijo"]; ?>" size="10" maxlength="15"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Celular:&nbsp;</td>
      <td><input name="celular" type="text" class="Contenidonegro" id="celular" onkeyup="chk_usuario();" value="<?php echo $rs["celular"]; ?>" size="40" maxlength="200"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Mail:&nbsp;</td>
      <td><input name="mail" type="text" class="Contenidonegro" id="mail" onkeyup="chk_usuario();" value="<?php echo $rs["mail"]; ?>" size="40" maxlength="200"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Region:&nbsp;</td>
      <td><select name="region" class="Contenidonegro" id="primerCombo" onchange="SeleccionandoCombo(this, 'segundoCombo');">
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
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Comuna:&nbsp;</td>
      <td><div align="left">
          <select name="comuna" class="Contenidonegro" id="segundoCombo">
          
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
        </div></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Direccion:&nbsp;</td>
      <td><input name="direccion" type="text" class="Contenidonegro" id="direccion" onkeyup="chk_usuario();" value="<?php echo $rs["direccion"]; ?>" size="40" maxlength="200"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle" bgcolor="#FF9900" class="Contenidonegro" ><span class="Letra1_blanca">Datos de la empresa</span></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" ><?php 
	  	$fecha = $rs["fecha_ocupacional"]; 
		list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
	  ?>
        Fecha de examen preocupacional 1:&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="15%"><div align="left">
            <select name="dia4" class="Contenidonegro" id="dia4">
              <option value="<?php echo $dia; ?>" selected="selected"><?php echo $dia; ?></option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div></td>
          <td width="15%"><select name="mes4" class="Contenidonegro" id="mes4">
            <option value="<?php echo $mes; ?>" selected="selected"><?php echo $mes; ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select></td>
          <td width="19%"><div align="left">
            <select name="ano4" class="Contenidonegro" id="ano4">
              <option value="<?php echo $ano; ?>" selected="selected"><?php echo $ano; ?></option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              </select>
          </div></td>
          <td width="51%"><a href="examen1/Upload_foto.php?id=<?php echo $rs["rut"]; ?>" class="Menu1">Actualizar </a>
            <?php if (file_exists("examen1/".$rs["rut"].".pdf")){ ?>
- <a href="examen1/<?php echo $rs["rut"]; ?>.pdf" class="Menu1">Ver archivo</a>
<?php } ?></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" ><?php 
	  	$fecha = $rs["fecha_ocupacional2"]; 
		list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
	  ?>
Fecha de examen preocupacional 2:</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="15%"><div align="left">
            <select name="dia2" class="Contenidonegro" id="dia2">
              <option value="<?php echo $dia; ?>" selected="selected"><?php echo $dia; ?></option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div></td>
          <td width="15%"><select name="mes2" class="Contenidonegro" id="mes2">
            <option value="<?php echo $mes; ?>" selected="selected"><?php echo $mes; ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select></td>
          <td width="19%"><div align="left">
            <select name="ano2" class="Contenidonegro" id="ano2">
              <option value="<?php echo $ano; ?>" selected="selected"><?php echo $ano; ?></option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              </select>
          </div></td>
          <td width="51%"><div align="left"><a href="examen2/Upload_foto.php?id=<?php echo $rs["rut"]; ?>" class="Menu1">Actualizar </a>
              <?php if (file_exists("examen2/".$rs["rut"].".pdf")){ ?>
- <a href="examen2/<?php echo $rs["rut"]; ?>.pdf" class="Menu1">Ver archivo</a>
<?php } ?>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Obra:&nbsp;</td>
      <td><select name="obra" class="Contenidonegro" id="obra">
        <?php 
    $listadoss = "select * from obras_empresa where id_obra  ='$rs[obra]'  ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
        <option value="<?php echo $rss["id_obra"]; ?>"><?php echo $rss["nombre_obra"]; ?></option>
        <?php } ?>
		
		
		
	    <?php 
    $listadoss = "select * from obras_empresa where visible ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
        <option value="<?php echo $rss["id_obra"]; ?>"><?php echo $rss["nombre_obra"]; ?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Cargo:&nbsp;</td>
      <td><select name="cargo" class="Contenidonegro" id="cargo">
        <?php 
    $listadoss = "select * from cargos_trabajadores where id_cargo ='$rs[cargo]'  ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
        <option value="<?php echo $rss["id_cargo"]; ?>" selected="selected"><?php echo $rss["nombre_cargo"]; ?></option>
        <?php } 
    $listadoss = "select * from cargos_trabajadores where act ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
        <option value="<?php echo $rss["id_cargo"]; ?>"><?php echo $rss["nombre_cargo"]; ?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Sueldo:&nbsp;</td>
      <td><input name="sueldo" type="text" class="Contenidonegro" id="sueldo" onkeyup="chk_usuario();" value="<?php echo $rs["sueldo"]; ?>" size="20" maxlength="40"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" ><?php 
	  	$fecha = $rs["fecha_ingreso"]; 
		list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
	  ?>
        Fecha ingreso a empresa:&nbsp;</td>
      <td><table width="15%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="left"></div></td>
          <td><select name="dia" class="Contenidonegro" id="dia">
            <option value="<?php echo $dia; ?>" selected="selected"><?php echo $dia; ?></option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select></td>
          <td><div align="left">
            <select name="mes" class="Contenidonegro" id="mes">
              <option value="<?php echo $mes; ?>" selected="selected"><?php echo $mes; ?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div></td>
          <td><label>
            <select name="ano" class="Contenidonegro" id="ano">
              <option value="<?php echo $ano; ?>" selected="selected"><?php echo $ano; ?></option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
            </select>
          </label></td>
          <td><div align="left"></div></td>
        </tr>
      </table>
        <label></label></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Previcion:&nbsp;</td>
      <td><div align="left">
        <select name="previcion" class="Contenidonegro" id="previcion">
          <?php 
    $listadoss = "select * from planprevision where id_plan ='$rs[previcion]' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
          <option value="<?php echo $rss["id_plan"]; ?>"><?php echo $rss["plan"]; ?></option>
          <?php } ?>
        
          <?php 
    $listadoss = "select * from planprevision where act ='si' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
          <option value="<?php echo $rss["id_plan"]; ?>"><?php echo $rss["plan"]; ?></option>
          <?php } ?>
          </select>
        </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Pensionado:&nbsp;</td>
      <td><div align="left">
        <label>
          <select name="pensionado" class="Contenidonegro" id="pensionado">
            <option value="<?php echo $rs["pensionado"]; ?>" selected="selected"><?php echo $rs["pensionado"]; ?></option>
            <option value="SI">SI</option>
            <option value="No">No</option>
          </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Salud:&nbsp;</td>
      <td><div align="left">
        <select name="salud" class="Contenidonegro" id="salud">
                   <?php 
    $listadoss = "select * from plansalud where id_plan ='$rs[salud]' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
          <option value="<?php echo $rss["id_plan"]; ?>" selected="selected"><?php echo $rss["plan"]; ?></option>
          <?php } ?>
		  
		  <?php 
    $listadoss = "select * from plansalud where act ='si' ";
	$sentenciass = mysql_query($listadoss,$conn);
	while($rss=mysql_fetch_array($sentenciass,$mibase)){
  ?>
          <option value="<?php echo $rss["id_plan"]; ?>"><?php echo $rss["plan"]; ?></option>
          <?php } ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Valor plan Isapre:&nbsp;</td>
      <td><div align="left">
        <label>
          <input name="valorisapre" type="text" class="Contenidonegro" id="valorisapre" value="<?php echo $rs["valorisapre"]; ?>" size="15" />
        </label>
        <span class="Contenidonegro">UF</span></div></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" bgcolor="#FF9900" class="Contenidonegro"><div align="center" class="Letra1_blanca">En caso de emergencias</div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Fono de emergencias 1:&nbsp;</td>
      <td><input name="fonoemergencias1" type="text" class="Contenidonegro" id="fonoemergencias1" onkeyup="chk_usuario();" value="<?php echo $rs["fonoemergencias1"]; ?>" size="10" maxlength="15"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Nombre a quien avisar 1:&nbsp;</td>
      <td><input name="nombreavisar1" type="text" class="Contenidonegro" id="nombreavisar1" onkeyup="chk_usuario();" value="<?php echo $rs["nombreavisar1"]; ?>" size="40" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Fono de emergencias 2:&nbsp;</td>
      <td><input name="fonoemergencias2" type="text" class="Contenidonegro" id="fonoemergencias2" onkeyup="chk_usuario();" value="<?php echo $rs["fonoemergencias2"]; ?>" size="10" maxlength="15"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Nombre a quien avisar 2:&nbsp;</td>
      <td><input name="nombreavisar2" type="text" class="Contenidonegro" id="nombreavisar2" onkeyup="chk_usuario();" value="<?php echo $rs["nombreavisar2"]; ?>" size="40" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Grupo sanguineo:&nbsp;</td>
      <td><input name="gruposanguineo" type="text" class="Contenidonegro" id="gruposanguineo" onkeyup="chk_usuario();" value="<?php echo $rs["gruposanguineo"]; ?>" size="20" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Alergico a:&nbsp;</td>
      <td><input name="alergicoa" type="text" class="Contenidonegro" id="alergicoa" onkeyup="chk_usuario();" value="<?php echo $rs["alergicoa"]; ?>" size="30" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Comentario adicional:&nbsp;</td>
      <td><textarea name="comentariosalud" cols="40" rows="5" class="Contenidonegro" id="comentariosalud" onkeyup="chk_usuario();"><?php echo $rs["comentariosalud"]; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="Modificar" type="submit" class="botones" id="Modificar" value="Modificar" />
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  <?php } ?>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="detalletrabajadores.php" class="Menu1">VOLVER</a></td>
  </tr>
</table></body>
</html>
<?php

function SelectBox( $Label, $selectName ){
  ?>
  <tr ALIGN="LEFT">
    <td width="15%"><?php echo $Label ?></td>
    <td align="left">
      <select name="<?php echo $selectName ?>">
        <option></option><option></option><option></option>
        <option>--------- Not Yet Loaded ---------</option> 
      </select>
    </td>
  </tr>
<?php 
} 
?>