<?php
include_once("includes/config.php");
include_once("includes/funciones_mias.php");




////IMPRIMIR
include_once("includes/arriba.php");
$imprimir.="
<div class='titulo_lote'>
<h2>Crear lote</h2> 
</div>";

//AQUI VA MENSAJE DE KO O OK
include_once("includes/generador_lotes.php");

echo $imprimir;
include_once("includes/abajo.php");
?>

