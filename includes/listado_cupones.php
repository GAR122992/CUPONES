<?php
//ABRIR CONEXION//
	if (mysqli_connect_errno()) {
	printf("Connect failed: %s", mysqli_connect_error());
	exit();
	} else {
	


//CONSULTAS BBDD

$sql = "SELECT * FROM ".$DB_cupones." WHERE id_lote='".$id_lote."'";
	$res = mysqli_query($mysqli, $sql);//or die("Error: consulta primera items");

	if ($res) {
		//copio id y nombre a la tabla menu
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		$imprimir.="
		  <tr class='lote'>
    <td>".$newArray['id']."</td>
    <td><strong>".$newArray['cupon']."</strong></td>
    <td>".$newArray['usos']." restantes</td>
  </tr>";
		//$contadorCAT ++;		
		//$autores[$contadorCAT][1] = $newArray['id'];
		//$autores[$contadorCAT][2] = $newArray['title'];

		}} else { //printf("Could not retrieve records en CONSULTA 1: %s", mysqli_error($mysqli));
	}//FIN PRIMERA CONSULTA//
	
	
	
	}
?>