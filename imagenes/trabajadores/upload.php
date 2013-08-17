<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../../letras.css" rel="stylesheet" type="text/css" />
<? 
$cadenatexto = $_GET["cadenatexto"]; 
$nombre_archivo = $cadenatexto .".png";
$tipo_archivo = $HTTP_POST_FILES['userfile']['type']; 
$tamano_archivo = $HTTP_POST_FILES['userfile']['size']; 
if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 100000))) { 
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br>";
	echo "<table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $nombre_archivo)){ 
       	echo "<div align=center class=Titulo>El archivo ha sido cargado correctamente.</div>"; 
		echo "<div align=center><span class=Titulo><a href=../../admin/editartrabajadores.php?rut=$cadenatexto class=Titulo>Volver</a></span></div>";
	}else{ 
		echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
    } 
} 
?> 
</html>