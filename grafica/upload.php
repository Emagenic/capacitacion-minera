
<? 
//tomo el valor de un elemento de tipo texto del formulario 
$cadenatexto = $_GET["cadenatexto"]; 
//datos del arhivo 
$nombre_archivo = $cadenatexto .".png";
$tipo_archivo = $HTTP_POST_FILES['userfile']['type']; 
$tamano_archivo = $HTTP_POST_FILES['userfile']['size']; 
//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) )) { 
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $nombre_archivo)){ 
 		echo "<div align=center>El archivo ha sido cargado correctamente.</div>"; 
	   	echo "<div align=center><a href=../../admin/servicios.php>
	   	<img src=../../grafica/vol.gif width=56 height=48 border=0 /></a></div>";
    }else{ 
       echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
    } 
} 
?> 