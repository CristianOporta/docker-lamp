<?php

include("conexion.php");
$con = conectar();
$placa = $_POST['placa'];

$sql = "SELECT * FROM autos WHERE placa='$placa'";
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

                <?php if(!empty($row)): ?>

                <div class="col-11 accordion-item abc">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <a href="">Resultado</a>
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body pt-0">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p class="lista_de_alumnos mb-0">Placa encontrada correctamente</p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Información</th>
                                    </tr>
                                </thead>
                                <hr class="mt-2 mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                        <?php echo "
                                            <p class='mb-2'><strong>No. de Placa: </strong> " . $row['placa'] . " <br><br>
                                                <strong>Modelo: </strong> " . $row['modelo'] . " <br><br>
                                                <strong>Marca: </strong> " . $row['marca'] . " 
                                            </p>" ?> 
                                        </td>

                                        <td>
                                        <?php echo $row['descripcion']; ?><br><br>

                                        <a href="./update_autos.php?placa=<?=$row['placa'] ?>">Editar</a>
                                        <a href="./delete_autos.php?placa=<?=$row['placa'] ?>">Eliminar</a>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <a href="./index.php">Ir a la página de inicio</a>
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>

                <?php elseif(empty($row)): ?>

                    <div class="col-11 accordion-item abc">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <a href="">Resultado</a>
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body pt-0">
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                            <p class="lista_de_alumnos mb-0">La placa ingresada no se ha econtrado</p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Información</th>
                                    </tr>
                                </thead>
                                <hr class="mt-2 mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                        </td>

                                        <td>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <a href="./index.php">Ir a la página de inicio</a>
                            <!-- ////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>

                <?php endif; ?>


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