<?php
session_start();
include("../Conexion.php");
if ($_POST["Agregar"]){
	$fecha = $_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
	$insertar="INSERT INTO incidentes_trabajador (fecha ,titulo,descripcion,act, empresa,trabajador) 
	VALUES('$fecha','$_POST[Titulo]','$_POST[Descripcion]', 'si', '$_SESSION[$nusuario]','$_GET[rut]')";
	$sentencia=mysql_query($insertar,$conn)or die("No se pudo registrar la actividad: ".mysql_error);
}

if ($_GET["fun"]=="eli"){
	$editar="update  incidentes_trabajador set act  = 'no' where empresa = '$_SESSION[$nusuario]' and trabajador ='$_GET[rut]' ";
	$sentencia = mysql_query($editar,$conn)or die("Error al grabar la venta: ".mysql_error);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../letras.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><span class="Titulo">Incidentes del trabajador</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="289" valign="top" align="justify"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF9900">
      <tr>
        <td height="15" align="center" valign="middle"><a href="incidentestrabajador.php?fun=new&amp;rut=<?php echo $_GET[rut] ?>" class="Letra1_blanca">NUEVO INCIDENTE</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="justify">
    
    
<?php if ($_GET["fun"]=="new"){ ?>

<form action="incidentestrabajador.php?rut=<?php echo $_GET["rut"] ?>" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre_cargo','','R','descripcion','','R');return document.MM_returnValue">
  <table width="400"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="33%" align="right" valign="middle" class="Contenidonegro">Fecha:&nbsp;</td>
      <td width="67%"><div align="left">
        <table width="15%" border="0" cellspacing="0" cellpadding="0">
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
        </table>
      </div></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="Contenidonegro">Titulo:&nbsp;</td>
      <td><input name="Titulo" type="text" class="Contenidonegro" id="Titulo" onkeyup="chk_usuario();" size="50" maxlength="1000"/></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Contenidonegro">Descripcion:&nbsp;</td>
      <td><div align="left">
        <textarea name="Descripcion" cols="50" rows="8" class="Contenidonegro" id="Descripcion" onkeyup="chk_usuario();"></textarea>
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input name="Agregar" type="submit" class="botones" id="Agregar" value="Agregar" />
      </div></td>
    </tr>
  </table>
</form>
<?php } ?>
<p class="Menu1" align="center">
<?php 
    $listado = "select * from trabajador where rut ='$_GET[rut]' and empresa = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		echo $rs["nombre"];
 } ?>

</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Eliminar</td>
    <td width="90%" bgcolor="#FF9900" class="Letra1_blanca" align="center">Incidentes</td>
    </tr>
  <?php 
    $listado = "select * from incidentes_trabajador where act ='si' and empresa = '$_SESSION[$nusuario]' and trabajador = '$_GET[rut]'";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <tr>
    <td align="center" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="8" align="center" valign="middle"></td>
        </tr>
        <tr>
          <td align="center" valign="middle"><a href="incidentestrabajador.php?fun=eli&amp;id=<?php echo $rs["id"]; ?>" onClick=" return confirm('Está seguro que desea eliminar?');"><img src="b_drop.png" alt="Eliminar cargo" width="16" height="16" border="0" /></a></td>
        </tr>
        <tr>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
      </table></td>
    <td class="Contenidonegro"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="Titulo"><?php echo $rs["titulo"]; ?></td>
      </tr>
      <tr>
        <td class="Contenidonegro"><?php echo date("d/m/Y",strtotime($rs["fecha"])); ?></td>
      </tr>
      <tr>
        <td class="Contenidonegro"><?php echo str_replace("\r\n","<br>",$rs["descripcion"]);  ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  <?php } ?>
</table>
    
    </td>
  </tr>
  <tr>
    <td valign="top" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="left"><a href="incidentestrabajadorall.php?rut=<?php echo $_GET[rut]; ?>" class="Menu1">VER INCIDENTES HISTORICOS</a></td>
  </tr>
  <tr>
    <td valign="top" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="center"><a href="detalletrabajadores.php" class="Menu1">VOLVER</a></td>
  </tr>
</table>
</body>
</html>
