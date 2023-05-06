<?php

include("conexion.php");
$con = conectar();
$id = $_GET['id'];

$sql = "SELECT * FROM estudiantes WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

// Cerrar la conexión a la base de datos
$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">

</head>

<body>
    <div class="container-fluide m-0">
        <!-- ////////////////////////////////////////////////////////////////////////////////// -->
        <div class="row header pt-2">
            <p class="text-center text-white encabezado">Práctica<br>Procesamiento de Formularios</p>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////// -->
        <div class="container contenedor_acordion pb-4" style="max-width: 800px;">
            <div class="row justify-content-center accordion accordion-flush" id="accordionFlushExample">
                <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                <div class="col-11 accordion-item abc">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <a href="">Editar</a>
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body pt-0">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p><strong>Alumnos</strong><br>Actualice los datos del estudiante:</p>
                            <form action="edit_estudiantes.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <p>Correo Electrónico
                                    <input class="form-control" style="width: 400px; margin-top: 5px" type="email" name="correo_electronico" id="correo_electronico" value="<?= $row['correo_electronico'] ?>" required>
                                </p>

                                <p>Nombre Completo
                                    <input class="form-control" style="width: 400px; margin-top: 5px" maxlength="200" type="text" name="nombre_completo" id="nombre_completo" value="<?= $row['nombre_completo'] ?>" required>
                                </p>

                                <p>Carnet
                                    <input  class="form-control carnet" style="width: 250px; margin-top: 5px;  background-color: rgb(226, 226, 226)" maxlength="10" type="text" name="carnet" id="carnet" value="<?= $row['carnet'] ?>" readonly>
                                </p>
                                
                                <p>Edad
                                    <input class="form-control" style="width: 200px; margin-top: 5px;" type="number" name="edad" id="edad" min="15" max="50" value="<?= $row['edad'] ?>" required>
                                </p>

                                <p>Curso Actual
                                    <input class="form-control" style="width: 250px; margin-top: 5px" type="number" name="curso_actual" id="curso_actual" min="1" max="5" value="<?= $row['curso_actual'] ?>" required>
                                </p>

                                <p>Foto <br>
                                    <?php  echo '<img src="./' . $row['foto'] . '" width="100" height="100"> <br/>'; ?>
                                    
                                    <!-- Manda la ruta de la foto anterior -->
                                    <input type="hidden" name="foto_anterior" value="<?= $row['foto'] ?>">

                                    <input class="form-control" style="width: 350px; margin-top: 5px" type="file" name="foto" id="foto" required>
                                </p>

                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                <hr class="mb-2">
                                
                                <a href="./index.php">Ir a la página de inicio</a>
                            </form>
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>
                <!-- ////////////////////////////////////////////////////////////////////////////////// -->
            </div>
        </div>
    </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>