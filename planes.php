<?php
	include("Conexion.php");
	$listado = "select * from  quienesomos";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$texto = str_replace("\r\n","<br>",$rs["contenido"]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
</head>
<body class="Letras3">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="500"><span class="Titulo">PLANES</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p class="Contenidonegro">Nuestro sistema tiene por objetivo llevar al alcance de su  empresa los datos de todos los trabajadores, desde cualquier parte del mundo  con un solo clic. Adem&aacute;s permite llevar un registro ordenado de los cargos, cursos,  incidentes y asistencia de una manera muy f&aacute;cil.</p></td>
  </tr>
  <tr>
    <td><p class="Contenidonegro">El sistema est&aacute; dividido en diferentes m&oacute;dulos, cada uno con  un valor distinto, el inicial y requisito principal para tomar los dem&aacute;s m&oacute;dulos  es el de ficha personal, este modulo permite registrar todos los trabajadores  de su empresa, sin l&iacute;mite, asignar una fotograf&iacute;a, datos personales y de  contacto en caso de emergencia. Tambi&eacute;n existe el modulo de cargos personales,  donde podr&aacute; registrar todas las herramientas, ropa, equipos, etc. que se le  asigne a cada trabajador. Esta el modulo de cursos y capacitaciones, que  permite registrar estas actividades trabajador por trabajador o a un grupo  completo. Modulo de incidentes, lleva una ficha de todos los incidentes en los  que se ha visto involucrado un trabajador y finalmente el modulo de asistencia  y turnos, que permite llevar un registro de estos y entrega un resultado mes a  mes.</p></td>
  </tr>
  <tr>
    <td><p class="Contenidonegro">Cada uno de estos m&oacute;dulos tiene un valor mensual de arriendo  que se detalla a continuaci&oacute;n.</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="68%" bgcolor="#333333" class="Letra1_blanca">Descripcion</td>
        <td width="32%" bgcolor="#333333" class="Letra1_blanca">Valor mensual neto</td>
      </tr>
      <tr>
        <td class="Contenidonegro"><span class="Contenidonegro">Ficha personal</span></td>
        <td class="Contenidonegro">$ 15.000</td>
      </tr>
      <tr>
        <td class="Contenidonegro"><span class="Contenidonegro">Cargos del trabajador</span></td>
        <td class="Contenidonegro">$ 2.000</td>
      </tr>
      <tr>
        <td class="Contenidonegro"><span class="Contenidonegro">Asistencia y turnos</span></td>
        <td class="Contenidonegro">$ 5.000</td>
      </tr>
      <tr>
        <td class="Contenidonegro"><span class="Contenidonegro">Capacitaciones</span></td>
        <td class="Contenidonegro">$ 2.000</td>
      </tr>
      <tr>
        <td><span class="Contenidonegro">Incidentes</span></td>
        <td class="Contenidonegro">$ 2.000</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
