<?php
include("conexion.php");
$con = conectar();
$sql = "SELECT * FROM estudiantes";
$query = mysqli_query($con, $sql);
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
                            <a href="">Formulario Alumnos</a>
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p><strong>Alumnos</strong><br>Llene el formulario con los datos del estudiante:</p>
                            <form action="insert_estudiantes.php" method="post" enctype="multipart/form-data">
                                <p>Correo Electrónico
                                    <input class="form-control" style="width: 400px; margin-top: 5px" type="email" name="correo_electronico" id="correo_electronico" placeholder="Ingrese su correo" required>
                                </p>

                                <p>Nombre Completo
                                    <input class="form-control" style="width: 400px; margin-top: 5px" maxlength="200" type="text" name="nombre_completo" id="nombre_completo" placeholder="Ingrese su nombre completo" required>
                                </p>

                                <p>Carnet
                                    <input  class="form-control" style="width: 250px; margin-top: 5px" maxlength="10" type="text" name="carnet" id="carnet" placeholder="Ingrese su número de carnet" required>
                                </p>
                                
                                <p>Edad
                                    <input class="form-control" style="width: 200px; margin-top: 5px" type="number" name="edad" id="edad" min="15" max="50" placeholder="Ingrese su edad" required>
                                </p>

                                <p>Curso Actual
                                    <input class="form-control" style="width: 250px; margin-top: 5px" type="number" name="curso_actual" id="curso_actual" min="1" max="5" placeholder="Ingrese su curso actual" required>
                                </p>

                                <p>Foto
                                    <input class="form-control" style="width: 350px; margin-top: 5px" type="file" name="foto" id="foto" required>
                                </p>

                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </form>
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>
                <!-- ////////////////////////////////////////////////////////////////////////////////// -->

                <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                <div class="col-11 accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <a href="">Listado de Alumnos</a>
                        </button>
                    </h2>

                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p class="mb-1"> <strong>Resultado</strong></p>
                            <p class="lista_de_alumnos mb-0">Lista de alumnos</p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Información</th>
                                    </tr>
                                </thead>
                                <hr class="mt-2 mb-0">
                                <tbody>
                                <?php while($row = mysqli_fetch_array($query)):?>
                                    <tr>
                                        <td>
                                            <?php echo '<img src="./' . $row['foto'] . '" width="100" height="100"> <br/>'; ?>
                                        </td>

                                        <td>
                                            <?php echo "
                                            <p class='mb-2'><strong>No. de Carnet: </strong> " . $row['carnet'] . " <br>
                                                <strong>Nombre: </strong> " . $row['nombre_completo'] . " <br>
                                                <strong>Correo Electrónico: </strong> " . $row['correo_electronico'] . " <br>
                                                <strong>Edad: </strong> " . $row['edad'] . " <br>
                                                <strong>Curso Actual: </strong> " . $row['curso_actual'] . " <br>
                                            </p>" ?>

                                        <a href="./update_estudiantes.php?id=<?=$row['id'] ?>">Editar</a>
                                        <a href="./delete_estudiantes.php?id=<?=$row['id'] ?>">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                            <a href=""></a>
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>
                <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                

                <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                <div class="col-11 accordion-item abc">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseOne">
                            <a href="">Formulario Autos</a>
                        </button>
                    </h2>

                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p><strong>Autos</strong><br>Llene el formulario con los datos del auto:</p>
                            <form action="insert_autos.php" method="post" enctype="multipart/form-data">
                                <p>Placa
                                    <input class="form-control" style="width: 400px; margin-top: 5px" type="text" name="placa" id="placa" placeholder="Ingrese su placa" required>
                                </p>

                                <p>Modelo
                                    <input class="form-control" style="width: 400px; margin-top: 5px" type="text" name="modelo" id="modelo" placeholder="Ingrese su modelo" required>
                                </p>

                                <p>Marca
                                    <input class="form-control" style="width: 250px; margin-top: 5px" type="text" name="marca" id="marca" placeholder="Ingrese su marca" required>
                                </p>
                                
                                <p>Descripción
                                    <textarea class="form-control" style="width: 400px; margin-top: 5px" name="descripcion" id="descripcion" placeholder="Ingrese una descripción" required></textarea>
                                </p>

                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </form>
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>
                <!-- ////////////////////////////////////////////////////////////////////////////////// -->

                <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                <div class="col-11 accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <a href="">Busqueda de un Auto</a>
                        </button>
                    </h2>

                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p><strong>Autos</strong><br>Ingrese una placa en el input para realizar la busqueda del auto:</p>
                            <form action="search_autos.php" method="post" enctype="multipart/form-data">
                                <p>Placa
                                    <input class="form-control" style="width: 400px; margin-top: 5px" type="text" name="placa" id="placa" placeholder="Ingrese su placa" required>
                                </p>

                                <button class="btn btn-primary" type="submit">Buscar</button>
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