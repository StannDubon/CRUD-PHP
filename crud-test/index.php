<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- Clase para mis fuentes personalizadas omg omg -->
    <link rel="stylesheet" href="recursos/fonts.css">

</head>

<body>

    <header>

        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand d-flex" href="#">
                    <img src="https://media0.giphy.com/media/uXZOSmv0glEDpG26VC/giphy.gif" height="50">
                    <b class="m-3 sendcat">Crud bien bonito para productos</b>
                </a>
            </div>
        </nav>

    </header>

    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

                <card class="card card-body">

                    <form action="producto_guardar.php" method="post">
                        <div class="form-group mb-3">
                            <input type="text" name="producto" class="form-control" placeholder="Producto" autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <input type="number" name="precio" class="form-control" placeholder="Precio" step="any">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="marca" class="form-control" placeholder="Marca">
                        </div>

                        <button type="submit" class="btn btn-light col-12" name="save">Guardar</button>
                    </form>

                </card>

                <!-- Verificamos que la sesión tenga algún mensaje para mostrar -->
                <?php if(isset($_SESSION['message'])) { ?>

                <div class="mt-2 alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">

                    <!-- Aquí se hace referencia al mensaje a mostrar -->
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>

                <?php session_unset(); } ?>

            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <!-- Aquí obtenemos cada resultado uno-a-uno  -->
                        <?php 
						$query = "SELECT * FROM productos";
						$result_task = mysqli_query($conn, $query);
						while($row = mysqli_fetch_array($result_task)) { ?>

                        <tr>
                            <td data-nombre="<?php echo $row['producto_id']; ?>">
                                <?php echo $row['producto_nombre']; ?>
                            </td>

                            <td data-precio="<?php echo $row['producto_id']; ?>">
                                $<?php echo $row['producto_precio']; ?>
                            </td>

                            <td data-marca="<?php echo $row['producto_id']; ?>">
                                <?php echo $row['producto_marca']; ?>
                            </td>
                            
                            <td>
                                <a href="producto_eliminar.php?id=<?php echo $row['producto_id']; ?>" class="no-decoration" >
                                    <img src="recursos/trash.svg" alt="">
                                </a>
                                <a href="#" class="btn-editar" data-bs-toggle="modal" data-bs-target="#modal_editar_producto" data-id="<?php echo $row['producto_id']; ?>">
                                    <img src="recursos/edit.svg" alt="">
                                </a>
                            </td>
                        </tr>

                        <?php } ?>


                    </tbody>
                </table>
            </div>

        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="modal_editar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="form_editar_producto" method="post">
                    <div class="modal-body">
                            <div class="form-group mb-3">
                                <input type="text" name="producto_update" class="form-control" placeholder="Actualice Producto" autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <input type="number" name="precio_update" class="form-control" placeholder="Actualice Precio" step="any">
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" name="marca_update" class="form-control" placeholder="Actualice Marca">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="edit" >Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- SweetAlerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Modal -->
    <script src="modal.js"></script>
    
</body>

</html>