<?php
// Realizar la conexión a la base de datos
include 'conexion.php';

$con = conectar();

// Recuperar los datos del formulario
$correo = $_POST['correo_electronico'];
$nombre = $_POST['nombre_completo'];
$carnet = $_POST['carnet'];
$edad = $_POST['edad'];
$curso = $_POST['curso_actual'];
$foto = $_FILES['foto']['name'];

// Verificar si la foto fue cargada y moverla a la carpeta correspondiente
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $idUnico = time();
    $foto_temp = $_FILES['foto']['tmp_name'];
    $ruta_foto = 'img/' . $idUnico . $foto;
    move_uploaded_file($foto_temp, $ruta_foto);
}
 
// Crear la consulta para insertar los datos en la tabla
$sql = "INSERT INTO estudiantes (correo_electronico, nombre_completo, carnet, edad, curso_actual, foto)
        VALUES ('$correo', '$nombre', '$carnet', '$edad', '$curso', '$ruta_foto')";


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
