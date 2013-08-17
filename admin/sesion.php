<?php
session_start();
include("../Conexion.php");
if($_POST["Entrar"]){	

	$password = md5($_POST["password_txt"]);
	
	$listado = "select * from usuario where usuario = '$_POST[nusuario_txt]' and password  = '$password' and activa = 'si'  ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$_SESSION["$nusuario"] = $rs["usuario"];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador</title>
<link href="../letras.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p align="center"><span class="Titulo">
        <?php if ($_SESSION["$nusuario"] == ""){ ?>
        Inicie sesion para modificar el contenido</span></p>
      <form id="form1" name="form1" method="post" action="sesion.php">
        <div align="center">
          <table width="200" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="80" class="Contenidonegro">Usuario</td>
              <td width="120"><label>
                <input name="nusuario_txt" type="text" class="Contenidonegro" id="nusuario_txt" size="15" />
              </label></td>
            </tr>
            <tr>
              <td height="5" colspan="2" class="Letras3"></td>
            </tr>
            <tr>
              <td class="Contenidonegro">Password</td>
              <td><input name="password_txt" type="password" class="Contenidonegro" id="password_txt" size="15" /></td>
            </tr>
            <tr>
              <td height="5" colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <label>
                  <input name="Entrar" type="submit" class="Contenidonegro" id="Entrar" value="Entrar" />
                </label>
              </div></td>
            </tr>
          </table>
        </div>
      </form>
      <div align="center">
        <p>
          <?php } else { ?>
        </p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table width="200" border="1" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" bgcolor="#FF9900"><span class="Letra1_blanca">ADMIN PAGINA</span></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><div align="center"><a href="home.php" class="Menu1">INICIO</a></div></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><div align="center"><a href="quienes_somos.php" class="Menu1">QUIENES SOMOS</a></div></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF" class="Menu1"><a href="clientestexto.php" class="Menu1">CLIENTES</a></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><div align="center" class="Menu1"><a href="servicios.php" class="Menu1">SERVICIOS</a></div></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><div align="center"><a href="cursos.php" class="Menu1">CURSOS</a></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><table width="200" border="1" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" bgcolor="#FF9900"><div align="center"><span class="Letra1_blanca">ADMIN SISTEMA</span></div></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#FFFFFF"><div align="center"><a href="empresas.php" class="Menu1">EMPRESAS</a></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><table width="200" border="1" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" bgcolor="#FF9900"><div align="center" class="Letra1_blanca">COMPLEMENTO TRABAJADORES</div></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#FFFFFF"><div align="center"><a href="planprevision.php" class="Menu1">PREVISION</a></div></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#FFFFFF"><div align="center"><a href="plansalud.php" class="Menu1">SALUD</a></div></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
    <?php } ?></td>
  </tr>
</table>
</body>
</html>
