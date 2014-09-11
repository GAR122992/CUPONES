<?php

////IMPRIMIR
include_once("includes/arriba.php");
$imprimir.="
<div class='titulo_lote'>
<h2>Crear lote</h2> 
</div>

<form action='result_lotes.php' method='post'>

<label>Nombre</label><br />
<input name='nombre' type='text' /><br />


<label>Descripción</label><br />
<input name='descripcion' type='text' size='60' /><br />

<label>Cantidad de usos por cup&oacute;n</label>
<br />
<input name='cantusos' type='text' /><br />

<label>Porcentaje descuento</label>
<br />
<input name='procentaje' type='text' size='3' />
 %<br />
 
 <label>Función custom</label>
<br />
<input name='custom_rule' type='text' />
 <br />

<label>Cantidad c&oacute;digos</label>
a generar<br />
<input name='cantcodigos' type='text' /><br />
<br />

<input name='' type='submit' value='Crear' />

</form>

";


echo $imprimir;
include_once("includes/abajo.php");
?>

