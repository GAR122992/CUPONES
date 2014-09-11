<?php
//CARGAMOS FUNCION RANDOM PERFECTO
include_once("random_alfanum.php");


//ABRIR CONEXION//
if (mysqli_connect_errno()) {
	printf("Connect failed: %s", mysqli_connect_error());
	exit();
} else {
	//INSERCIONES BBDD

	if(mysqli_num_rows(mysqli_query($mysqli,"SHOW TABLES LIKE '".$DB_lotes."'"))==1) {
	} else {
		//CREATE TABLA LOTES
		mysqli_query($mysqli,'
CREATE TABLE IF NOT EXISTS `'.$DB_lotes.'` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(100) NOT NULL,
`descripcion` varchar(255) NOT NULL,
`cantusos` int(11) NOT NULL,
`procentaje` int(11) NOT NULL,
`custom_rule` varchar(255) NOT NULL,
`cantcodigos` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
');
	}

	$sql="INSERT INTO ".$DB_lotes." (nombre, descripcion, cantusos, procentaje,custom_rule, cantcodigos) VALUES ('$_POST[nombre]','$_POST[descripcion]','$_POST[cantusos]','$_POST[procentaje]','$_POST[custom_rule]','$_POST[cantcodigos]')";
	$res = mysqli_query($mysqli, $sql);//or die("Error: consulta primera items");
	

	if ($res === TRUE) {
		$imprimir.="<p>Lote de cupones creado correctamente</p>";
		

	} else { printf("Error al intentar generar lote de cupones: %s", mysqli_error($mysqli));
	}//FIN PRIMERA INSERCION//
	
	//TOMAMOS LA ID DE LA INSERCCION QUE ACABAMOS DE HACER
	$ultima_entrada= mysqli_insert_id($mysqli);


	//CREAR CUPONES EN BATCH	
	for ($x=0;$x<($_POST[cantcodigos]);$x++){

		//CHECK QUE LA TABLA CUPONES EXISTE
		if(mysqli_num_rows(mysqli_query($mysqli,"SHOW TABLES LIKE '".$DB_cupones."'"))==1) {
		} else {
			//CREATE TABLA LOTES
			mysqli_query($mysqli,'
CREATE TABLE IF NOT EXISTS `'.$DB_cupones.'` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`cupon` varchar(255) NOT NULL,
`usos` int(11) NOT NULL,
`id_lote` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
');
		}


		//GENERAR UN CODIGO NO REPETIDO
		//::::::::::::::::::::
		// Existe el valor?
		for ($r=0;$r<1;$r++) {
			$cupon=$prefijo_cupones.azarAlfaNum($cantidad_cifras);

			$sql = "SELECT cupon FROM ".$DB_cupones." WHERE cupon='".$cupon."'";
			$res = mysqli_query($mysqli, $sql);//or die("Error: consulta primera items");
			if ($res) {
				while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
					$chequeo++;
					echo "he encontrado un repetido<br>";
				}} else {}
			if ($chequeo==0){
				$r=1;
			} else { $r=0; }
		}
		//:::::::::::::::::::::::



		$sql="INSERT INTO ".$DB_cupones." (cupon, usos, id_lote) VALUES ('$cupon','$_POST[cantusos]','$ultima_entrada')";
		$res = mysqli_query($mysqli, $sql);//or die("Error: consulta primera items");

		if ($res === TRUE) {
			//$imprimir.="<p>Lote de cupones creado correctamente</p>";

		} else { printf("Error al intentar generar lote de cupones2: %s", mysqli_error($mysqli));
		}

	}//FIN SEGUNDA INSERCION//



	
}


?>