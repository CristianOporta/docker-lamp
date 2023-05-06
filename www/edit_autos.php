<?php
// Realizar la conexión a la base de datos
include 'conexion.php';

$con = conectar();

// Recuperar los datos del formulario
$id = $_POST['id'];
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];

// Actualizar la consulta para insertar los datos en la tabla
$sql = "UPDATE autos
        SET placa = '$placa',
            modelo = '$modelo',
            marca = '$marca',
            descripcion = '$descripcion'
        WHERE id = $id";


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