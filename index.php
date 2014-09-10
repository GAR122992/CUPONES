<?php

////IMPRIMIR

$imprimir.="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-2' />
<title>Gestor de Cupones de descuento</title>
<link href='css/styles.css' rel='stylesheet' type='text/css' />
</head>
<form action='lotes.php' method='post'>

<label>Usuario</label>
<br />
<input name='usuario' type='text' /><br />


<label>Contrase&ntilde;a</label>
<br />
<input name='contrasenya' type='password' />
<br />


<br />
<br />

<input type='submit' value='Enviar' />

</form>
</html>
";


echo $imprimir;

?>

