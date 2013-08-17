<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../letras.css" rel="stylesheet" type="text/css" />
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

  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="middle"><?php 
echo "<form action=upload.php?cadenatexto=".$_GET["id"]." method=post enctype=multipart/form-data> "
?>
    <br>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000"> 
    <br> 
    <br> 
    <b class="Titulo">Seleccione una foto del trabajador: </b> 
    <br> 
    <input name="userfile" type="file"> 
    <br> 
    <input type="submit" value="Grabar"> 
    </form> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:history.back(1)" class="Menu1">VOLVER ATRÁS</a></td>
    </tr>
  </table>
</body>
</html>