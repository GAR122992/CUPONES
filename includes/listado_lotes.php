<?php
//ABRIR CONEXION//
	if (mysqli_connect_errno()) {
	printf("Connect failed: %s", mysqli_connect_error());
	exit();
	} else {
//CONSULTAS BBDD


$sql = "SELECT * FROM ".$DB_lotes."";
	$res = mysqli_query($mysqli, $sql);//or die("Error: consulta primera items");

	if ($res) {
		//copio id y nombre a la tabla menu
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		$imprimir.="
		  <tr class='lote'>
    <td>".$newArray['id']."</td>
    <td><strong>".$newArray['nombre']."</strong></td>
    <td>".$newArray['descripcion']."</td>
    <td>".$newArray['cantusos']." usos</td>
    <td>".$newArray['procentaje']."%</td>
    <td>".$newArray['cantcodigos']."</td>
    <td><a href='cupones.php?id=".$newArray['id']."&amp;nombre=".urlencode($newArray['nombre'])."' class='caji ver'>ver</a></td>
    <td><a href='eliminar.php?id=".$newArray['id']."' class='caji eliminar'>eliminar</a></td>
  </tr>";
		//$contadorCAT ++;		
		//$autores[$contadorCAT][1] = $newArray['id'];
		//$autores[$contadorCAT][2] = $newArray['title'];

		}} else { //printf("Could not retrieve records en CONSULTA 1: %s", mysqli_error($mysqli));
	}//FIN PRIMERA CONSULTA//
	
	
	
	}
?>