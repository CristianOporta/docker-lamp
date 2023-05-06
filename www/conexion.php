<?php
function conectar(){
    // Configuración de la conexión a la base de datos
    $host = "db"; // Nombre del servidor de la base de datos
    $user = "root"; // Nombre de usuario de la base de datos
    $password = "test"; // Contraseña de la base de datos
    $database = "dbname"; // Nombre de la base de datos

    // Creación de la conexión
    $con = mysqli_connect($host, $user, $password, $database);
    
    // Verificación de la conexión
    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    // Retorna la conexión
    return $con;
}
?>

