<?php
session_start();

if ($_POST['usuario']==$usuario && $_POST['contrasenya']==$contrasenya){
       	   $_SESSION['zezion']="OK";
		   }
if ($_SESSION['zezion'] !== "OK"){
//die("<h2>No has iniciado sesion o tu Usuario o contrase&ntilde;a son incorrectos</h2><br><a href='index.php'>Volver</a>");
die(header('Location:index.php'));


}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestor de Cupones de descuento</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1>Gestor de Cupones de descuento</h1>

<div id="menu">
  <a href="lotes.php" class="caji">LOTES</a>
<a href="form_lotes.php"class="caji">CREAR LOTE</a></div>