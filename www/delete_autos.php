<?php
// Realizar la conexión a la base de datos
include 'conexion.php';

$con = conectar();
$placa = $_GET['placa'];
$sql = "DELETE FROM autos WHERE placa='$placa'";
$query = mysqli_query($con, $sql);
$inicio = '/index.php';
echo '<meta http-equiv="refresh" content="0; url=' . $inicio . '">';
$con->close();
// Redirigir a la página "nueva_pagina.php"
// Cerrar la conexión a la base de datos
?>