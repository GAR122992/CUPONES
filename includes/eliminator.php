<?php
//ABRIR CONEXION//
	if (mysqli_connect_errno()) {
	printf("Connect failed: %s", mysqli_connect_error());
	exit();
	} else {
//ELIMINATOR EN ACCION

//ELIMINAR LOTE
mysqli_query($mysqli,"DELETE FROM ".$DB_lotes." WHERE id=".$id_lote."");

//ELIMINAR CUPONES ASOCIADOS
mysqli_query($mysqli,"DELETE FROM ".$DB_cupones." WHERE id_lote=".$id_lote."");
	
	}
	
	
//header("Location: lotes.php");
$imprimir.="<p>borrado con éxito</p>";
?>