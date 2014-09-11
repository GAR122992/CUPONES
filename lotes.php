<?php
include_once("includes/config.php");
include_once("includes/funciones_mias.php");





////IMPRIMIR
include_once("includes/arriba.php");
$imprimir.="
<table border='0' cellspacing='0' cellpadding='12'>

  <tr id='titulos_tabla'>
    <td>Id</td>
    <td>Nombre</td>
    <td>Descripci&oacute;n</td>
    <td>Cant. Usos</td>
    <td>% descuento</td>
	 <td>Función custom</td>
    <td>Cantidad C&oacute;digos</td>
    <td>Ver</td>
    <td>Eliminar?</td>
  </tr>";
  
  
// AQUI VA EL MOTOR DE GENERAR LOTES 
include_once("includes/listado_lotes.php");


$imprimir.="</table>

";


echo $imprimir;
include_once("includes/abajo.php");
?>

