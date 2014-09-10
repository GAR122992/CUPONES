<?php

//USUARIO
$usuario="username";
$contrasenya="pass";

//DATOS CONEXION BBDD
$mysqli = mysqli_connect("myhost","myuser","mypassw","mybd");
global $mysqli;

//NOMBRES TABLAS
$DB_lotes="tabla_lotes";
$DB_cupones="tabla_cupones";

//CUPONES
$prefijo_cupones="PREFIX";
$cantidad_cifras=5;
global $cantidad_cifras;

?>