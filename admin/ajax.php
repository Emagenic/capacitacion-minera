<?php
session_start();
include("../Conexion.php");
$_valor = $_GET['valor'];
	$listado = "select * from comuna where region ='$_valor' ";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$_arreglo[] = array('id' => $rs["id"], 'data' => $rs["comuna"]);
	}	
echo json_encode($_arreglo);
?>