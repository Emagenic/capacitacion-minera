
<? 
//tomo el valor de un elemento de tipo texto del formulario 
$cadenatexto = $_GET["rut"]."-".$_GET["id"];
//datos del arhivo 
$nombre_archivo = $cadenatexto .".pdf";
$tipo_archivo = $HTTP_POST_FILES['userfile']['type']; 
$tamano_archivo = $HTTP_POST_FILES['userfile']['size']; 
//compruebo si las caracter�sticas del archivo son las que deseo 
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "PDF")) )) { 
    echo "La extensi�n o el tama�o de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf o .PDF<br><li>se permiten archivos de 2 Mb m�ximo.</td></tr></table>"; 
}else{ 
    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $nombre_archivo)){ 
 		echo "<div align=center>El archivo ha sido cargado correctamente.</div>"; 
	   	echo "<div align=center><a href=../cargostrabajador.php?rut=$_GET[rut]>VOLVER</a></div>";
    }else{ 
       echo "Ocurri� alg�n error al subir el fichero. No pudo guardarse."; 
    } 
} 
?> 