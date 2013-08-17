<?php
session_start();
include("../Conexion.php");
 if ($_SESSION[$nusuario]==""){
	echo "NO ESTÁ AUTORIZADO A UTILIZAR EL SISTEMA SIN INICIAR SESIÓN.";
 } else {


if ($_POST["Agregar"]){
function valida_rut($r)
{
	$r=strtoupper(ereg_replace('\.|,|-','',$r));
	$sub_rut=substr($r,0,strlen($r)-1);
	$sub_dv=substr($r,-1);
	$x=2;
	$s=0;
	for ( $i=strlen($sub_rut)-1;$i>=0;$i-- )
	{
		if ( $x >7 )
		{
			$x=2;
		}
		$s += $sub_rut[$i]*$x;
		$x++;
	}
	$dv=11-($s%11);
	if ( $dv==10 )
	{
		$dv='K';
	}
	if ( $dv==11 )
	{
		$dv='0';
	}
	if ( $dv==$sub_dv )
	{
		return true;
	}
	else
	{
		return false;
	}
}

if ( valida_rut($_POST['rut']) )
{
	$fecha_ocupacional = $_POST["ano4"]."-".$_POST["mes4"]."-".$_POST["dia4"];
	$fecha_ocupacional2 = $_POST["ano2"]."-".$_POST["mes2"]."-".$_POST["dia2"];
	$fecha_ingreso = $_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
	$fecha_nacimiento = $_POST["ano3"]."-".$_POST["mes3"]."-".$_POST["dia3"];
	$listado = "select * from trabajador where rut ='$_POST[rut]' and act ='si' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
	
	
	} else {
		$insertar="INSERT INTO trabajador (empresa,rut, nombre, ecivil, nacimiento, fonofijo, 
		celular,mail , region, comuna, direccion, fecha_ocupacional,fecha_ocupacional2, obra, cargo, sueldo, fecha_ingreso, previcion, pensionado, 
		salud, valorisapre, fonoemergencias1, nombreavisar1, fonoemergencias2, nombreavisar2,gruposanguineo, alergicoa, comentariosalud,act)
		VALUES (
		'$_SESSION[$nusuario]',
		'$_POST[rut]',
		'$_POST[nombre]',
		'$_POST[ecivil]',
		'$fecha_nacimiento',
		'$_POST[fonofijo]',
		'$_POST[celular]',
		'$_POST[mail]',
		'$_POST[region]',
		'$_POST[comuna]',
		'$_POST[direccion]',
		'$fecha_ocupacional',
		'$fecha_ocupacional2',
		'$_POST[obra]',
		'$_POST[cargo]',
		'$_POST[sueldo]',
		'$fecha_ingreso',
		'$_POST[previcion]',
		'$_POST[pensionado]',
		'$_POST[salud]',
		'$_POST[valorisapre]',
		'$_POST[fonoemergencias1]',
		'$_POST[nombreavisar1]',
		'$_POST[fonoemergencias2]',
		'$_POST[nombreavisar2]',
		'$_POST[gruposanguineo]',
		'$_POST[alergicoa]',
		'$_POST[comentariosalud]',
		'si'
		)";
		$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar el trabajador: ".mysql_error);
	}
} else {
 echo "<span class=Titulo>El rut es incorrecto, debe intentarlo nuevamente</span>";
}
} 
if ($_GET["fun"]=="eli"){
	$listado = "select * from trabajador where rut = '$_GET[rut]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
		if ($rs["empresa"] == $_GET["empresa"]){
			$editar="update  trabajador set act  = 'no' where rut = '$_GET[rut]' ";
			$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
		} else {
			echo "<p>NO ESTÁ AUTORIZADO A ELIMINAR A ESTE TRABAJADOR</p>";	
		}
	}
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
    <td align="center"><span class="Titulo">Trabajadores</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    
    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF9900">
  <tr>
    <td height="15" align="center" valign="middle"><div align="center"><a href="detalletrabajadores.php?fun=new&amp;empresa=<?php echo $_GET["empresa"] ?>" class="Letra1_blanca">NUEVO TRABAJADOR</a></div></td>
  </tr>
  </table></p>
 <?php if ($_GET["fun"]=="new"){ ?>
<form action="detalletrabajadores.php" method="post" name="Form" onsubmit="MM_validateForm('rut','','R','nombre','','R','direccion','','R');return document.MM_returnValue">
  <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" bgcolor="#FF9900" class="Contenidonegro"><span class="Letra1_blanca">Datos personales</span></td>
    </tr>
    <tr>
      <td align="right" class="Contenidonegro">Rut:&nbsp;</td>
      <td><input name="rut" type="text" class="Contenidonegro" id="rut" onkeyup="chk_usuario();" size="15" maxlength="10"/></td>
    </tr>
    <tr>
      <td width="59%" align="right" class="Contenidonegro">Nombre:&nbsp;</td>
      <td width="41%"><div align="left">
        <input name="nombre" type="text" class="Contenidonegro" id="nombre" onkeyup="chk_usuario();" size="40" maxlength="150"/>
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Estado civil:&nbsp;</td>
      <td><label for="ecivil"></label>
        <select name="ecivil" class="Contenidonegro" id="ecivil">
          <option value="Soltero">Soltero</option>
          <option value="Casado">Casado</option>
          <option value="Viudo">Viudo</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Fecha de nacimiento:&nbsp;</td>
      <td><table width="15%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="left"></div></td>
          <td><select name="dia3" class="Contenidonegro" id="dia3">
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
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div></td>
          <td><label>
            <select name="ano3" class="Contenidonegro" id="ano3">
              
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
              <option value="2011" selected="selected">2011</option>
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
      <td><input name="fonofijo" type="text" class="Contenidonegro" id="fonofijo" onkeyup="chk_usuario();" size="10" maxlength="15"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Celular:&nbsp;</td>
      <td><input name="celular" type="text" class="Contenidonegro" id="celular" onkeyup="chk_usuario();" size="40" maxlength="200"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Mail:&nbsp;</td>
      <td><input name="mail" type="text" class="Contenidonegro" id="mail" onkeyup="chk_usuario();" size="40" maxlength="200"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Region:&nbsp;</td>
      <td><select name="region" class="Contenidonegro" id="primerCombo" onchange="SeleccionandoCombo(this, 'segundoCombo');">
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
      <td align="right" valign="middle" class="Contenidonegro" >Comuna:&nbsp;</td>
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
      <td align="right" valign="middle" class="Contenidonegro" >Direccion:&nbsp;</td>
      <td><input name="direccion" type="text" class="Contenidonegro" id="direccion" onkeyup="chk_usuario();" size="40" maxlength="200"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle" bgcolor="#FF9900" class="Contenidonegro" ><span class="Letra1_blanca">Datos de la empresa</span></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Fecha de examen preocupacional 1:&nbsp;</td>
      <td><table width="15%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="left"></div></td>
          <td><select name="dia4" class="Contenidonegro" id="dia4">
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
            <select name="mes4" class="Contenidonegro" id="mes4">
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div></td>
          <td><label>
            <select name="ano4" class="Contenidonegro" id="ano4">
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
              <option value="2011" selected="selected">2011</option>
              <option value="2012">2012</option>
            </select>
          </label></td>
          <td><div align="left"></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Fecha de examen preocupacional 2:&nbsp;</td>
      <td><table width="15%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="left"></div></td>
          <td><select name="dia2" class="Contenidonegro" id="dia2">
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
            <select name="mes2" class="Contenidonegro" id="mes2">
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div></td>
          <td><label>
            <select name="ano2" class="Contenidonegro" id="ano2">
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
              <option value="2011" selected="selected">2011</option>
              <option value="2012">2012</option>
            </select>
          </label></td>
          <td><div align="left"></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Obra:&nbsp;</td>
      <td><select name="obra" class="Contenidonegro" id="obra">
        <?php 
    $listado = "select * from obras_empresa where visible ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
        <option value="<?php echo $rs["id_obra"]; ?>"><?php echo $rs["nombre_obra"]; ?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Cargo:&nbsp;</td>
      <td><select name="cargo" class="Contenidonegro" id="cargo">
        <?php 
    $listado = "select * from cargos_trabajadores where act ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
        <option value="<?php echo $rs["id_cargo"]; ?>"><?php echo $rs["nombre_cargo"]; ?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Sueldo:&nbsp;</td>
      <td><input name="sueldo" type="text" class="Contenidonegro" id="sueldo" onkeyup="chk_usuario();" size="20" maxlength="40"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro" >Fecha ingreso a empresa:&nbsp;</td>
      <td><table width="15%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="left"></div></td>
          <td><select name="dia" class="Contenidonegro" id="dia">
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
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
          </div></td>
          <td><label>
            <select name="ano" class="Contenidonegro" id="ano">
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
              <option value="2011" selected="selected">2011</option>
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
    $listado = "select * from planprevision where act ='si' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
          <option value="<?php echo $rs["id_plan"]; ?>"><?php echo $rs["plan"]; ?></option>
          <?php } ?>
          </select>
        </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Pensionado:&nbsp;</td>
      <td><div align="left">
        <label>
          <select name="pensionado" class="Contenidonegro" id="pensionado">
            <option value="SI">SI</option>
            <option value="No" selected="selected">No</option>
          </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Salud:&nbsp;</td>
      <td><div align="left">
        <select name="salud" class="Contenidonegro" id="salud">
          <?php 
    $listado = "select * from plansalud where act ='si' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
          <option value="<?php echo $rs["id_plan"]; ?>"><?php echo $rs["plan"]; ?></option>
          <?php } ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Valor plan Isapre:&nbsp;</td>
      <td><div align="left">
        <label>
          <input name="valorisapre" type="text" class="Contenidonegro" id="valorisapre" size="15" />
        </label>
        <span class="Contenidonegro">UF</span></div></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" bgcolor="#FF9900" class="Contenidonegro"><div align="center" class="Letra1_blanca">En caso de emergencias</div></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Fono de emergencias 1:&nbsp;</td>
      <td><input name="fonoemergencias1" type="text" class="Contenidonegro" id="fonoemergencias1" onkeyup="chk_usuario();" size="10" maxlength="15"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Nombre a quien avisar 1:&nbsp;</td>
      <td><input name="nombreavisar1" type="text" class="Contenidonegro" id="nombreavisar1" onkeyup="chk_usuario();" size="40" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Fono de emergencias 2:&nbsp;</td>
      <td><input name="fonoemergencias2" type="text" class="Contenidonegro" id="fonoemergencias2" onkeyup="chk_usuario();" size="10" maxlength="15"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Nombre a quien avisar 2:&nbsp;</td>
      <td><input name="nombreavisar2" type="text" class="Contenidonegro" id="nombreavisar2" onkeyup="chk_usuario();" size="40" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Grupo sanguineo:&nbsp;</td>
      <td><input name="gruposanguineo" type="text" class="Contenidonegro" id="gruposanguineo" onkeyup="chk_usuario();" size="20" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Alergico a:&nbsp;</td>
      <td><input name="alergicoa" type="text" class="Contenidonegro" id="alergicoa" onkeyup="chk_usuario();" size="30" maxlength="150"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Comentario adicional:&nbsp;</td>
      <td><textarea name="comentariosalud" cols="40" rows="5" class="Contenidonegro" id="comentariosalud" onkeyup="chk_usuario();"></textarea></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="Agregar" type="submit" class="botones" id="Agregar" value="Agregar" />
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<?php } ?>
<table width="550" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="33" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Editar</div></td>
    <td width="44" bgcolor="#FF9900" class="Letra1_blanca"><div align="center">Eliminar</div></td>
    <td width="73" bgcolor="#FF9900" class="Letra1_blanca">Rut</td>
    <td width="159" bgcolor="#FF9900" class="Letra1_blanca">Nombre</td>
    <td width="181" bgcolor="#FF9900" class="Letra1_blanca">Cargo</td>
    <td width="46" align="center" bgcolor="#FF9900" class="Letra1_blanca">Operadores.</td>
  </tr>
  <?php 
    $listado = "select rut, nombre, cargo from trabajador where act ='si' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td valign="top"><div align="center"><a href="editartrabajadores.php?rut=<?php echo $rs["rut"]; ?>"><img src="Lapiz.png" width="16" height="16" border="0" /></a></div></td>
    <td valign="top"><div align="center">
    <a href="detalletrabajadores.php?fun=eli&amp;rut=<?php echo $rs["rut"]; ?>&amp;empresa=<?php echo $_SESSION["$nusuario"] ?>" onClick=" return confirm('Está seguro que desea eliminar?');"><img src="b_drop.png" alt="Eliminar cargo" width="16" height="16" border="0" /></a></div></td>
    <td valign="top" class="Contenidonegro"><?php echo $rs["rut"]; ?></td>
    <td valign="top" class="Contenidonegro"><?php echo $rs["nombre"]; ?></td>
    <td valign="top" class="Contenidonegro"><?php
	$listados = "select nombre_cargo , id_cargo from cargos_trabajadores where id_cargo  ='$rs[cargo]' ";
	$sentencias = mysql_query($listados,$conn);
	while($rss=mysql_fetch_array($sentencias,$mibase)){
		echo $rss["nombre_cargo"]; 
	}
	?></td>
    <td align="center" valign="top" class="Contenidonegro"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25%"><a href="cargostrabajador.php?rut=<?php echo $rs["rut"]; ?>"><img src="folderopen.gif" alt="Herramientas y cargos" width="18" height="18" border="0" /></a></td>
          <td width="14%">&nbsp;</td>
          <td width="61%" align="left"><a href="cargostrabajador.php?rut=<?php echo $rs["rut"]; ?>" class="Menu1">Cargos</a></td>
        </tr>
        <tr>
          <td><a href="incidentestrabajador.php?rut=<?php echo $rs["rut"]; ?>"><img src="folderopen.gif" alt="Herramientas y cargos" width="18" height="18" border="0" /></a></td>
          <td>&nbsp;</td>
          <td align="left"><a href="incidentestrabajador.php?rut=<?php echo $rs["rut"]; ?>" class="Menu1">Incidentes</a></td>
        </tr>
        <tr>
          <td><a href="capacitaciones_trabajador.php?rut=<?php echo $rs["rut"]; ?>"><img src="folderopen.gif" alt="Herramientas y cargos" width="18" height="18" border="0" /></a></td>
          <td>&nbsp;</td>
          <td align="left"><a href="capacitacionestrabajador.php?rut=<?php echo $rs["rut"]; ?>" class="Menu1">Capacitaciones</a></td>
        </tr>
      </table></td>
  </tr>
  <?php } ?>
</table>
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="detalleempresa.php" class="Menu1">VOLVER</a></td>
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
} }
?>