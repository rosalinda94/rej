<?php
include 'funciones.php';
$db= conexion();
$consulta = $db->prepare("INSERT INTO sport VALUES(null, 'prueba')");

$consulta->execute();

 ?>
