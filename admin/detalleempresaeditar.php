<?php
session_start();
	include("../Conexion.php");
if ($_POST["Modificar"]){
	$editar="update empresas  set giro   = '$_POST[giro]', region   = '$_POST[region_combo]', comuna   = '$_POST[comuna_combo]', direccion   = '$_POST[direccion]',fonoempresa = '$_POST[telefono]' , web   = '$_POST[web]', mailempresa   = '$_POST[mail]'  where rut = '$_SESSION[$nusuario]' ";
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
</head>

<body class="Titulo">

  <?php
  	$listado = "select * from empresas where rut = '$_SESSION[$nusuario]' ";
	$sentencia = mysql_query($listado,$conn);
	if($rs=mysql_fetch_array($sentencia,$mibase)){
  ?>
  <form id="form1" name="form1" method="post" action="detalleempresaeditar.php">
    <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="center"><?php echo $rs["nombre"];  ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="2" align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="78" height="2" bgcolor="#333333" class="Contenidonegro"></td>
            <td width="1" bgcolor="#333333" class="Contenidonegro"></td>
            <td width="271" bgcolor="#333333" class="Contenidonegro"></td>
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
            <td class="Contenidonegro"><div align="left">
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
            </div></td>
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
        </table></td>
        <td align="center"><a href="../imagenes/empresas/Upload_categoria.php?id=<?php echo $rs["rut"]; ?>" class="Titulo">Cambiar logo</a></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="../imagenes/empresas/<?php echo $rs["rut"]; ?>.png" width="150" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="200">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="Modificar" id="Modificar" value="Modificar" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</form>
  <p>
    <?php } ?>
</p>
  <p>&nbsp;</p>
  <p align="center"><a href="detalleempresa.php" class="Titulo">volver</a> </p>

</body>
</html>
