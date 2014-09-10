<?php
include_once("includes/config.php");
include_once("includes/funciones_mias.php");

//TOMO EL NOMBRE DEL LOTE DE GET
$id_lote = $_GET['id'];


////IMPRIMIR
include_once("includes/arriba.php");
$imprimir.="
<div class='titulo_lote'>
<h2>Eliminar lote</h2> 
</div>";
  
  
// AQUI VA EL MOTOR DE BORRAR LOTES
include_once("includes/eliminator.php");



echo $imprimir;
include_once("includes/abajo.php");
?>

