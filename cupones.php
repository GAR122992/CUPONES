<?php
include_once("includes/config.php");
include_once("includes/funciones_mias.php");

//TOMO EL NOMBRE DEL LOTE DE GET
$id_lote = $_GET['id'];
$nombre_lote = $_GET['nombre'];


////IMPRIMIR
include_once("includes/arriba.php");
$imprimir.="
<div class='titulo_lote'>
<h2>".$nombre_lote."</h2> 
</div>

<table border='0' cellspacing='0' cellpadding='12'>

  <tr id='titulos_tabla'>
    <td>Id</td>
    <td>Cup&oacute;n</td>
    <td>Usos</td>
  </tr>";
  
  
// AQUI VA EL MOTOR DE GENERAR LOTES 
include_once("includes/listado_cupones.php");


$imprimir.="</table>

";


echo $imprimir;
include_once("includes/abajo.php");
?>

