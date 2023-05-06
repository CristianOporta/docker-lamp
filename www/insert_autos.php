<?php
// Realizar la conexión a la base de datos
include 'conexion.php';

$con = conectar();

// Obtener datos del formulario
$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$descripcion = $_POST["descripcion"];

// Crear consulta SQL para insertar datos en la tabla "estudiantes"
$sql = "INSERT INTO autos (placa, modelo, marca, descripcion) VALUES ('$placa', '$modelo', '$marca', '$descripcion')";



// Ejecutar la consulta y verificar si se realizó con éxito
if ($con->query($sql) === TRUE) {
    $inicio = '/index.php';
    echo '<meta http-equiv="refresh" content="0; url=' . $inicio . '">';
} else {

    echo "Error: " . $sql . "<br>" . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();
?>