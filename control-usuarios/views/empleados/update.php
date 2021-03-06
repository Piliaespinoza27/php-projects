<?php include('../../includes/header.php') ?>
<?php include('../../includes/navbar.php') ?>
<?php include('../../models/DBCommon.php') ?>


<?php if (isset($_GET['idEditar'])) { ?>

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Modificar Empleado</h1>
                <p class="lead">
                    This is a modified jumbotron that occupies the entire horizontal space of its parent.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">



        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    MODIFICAR EMPLEADO DE USUARIO
                </div>
                <div class="card-body">
                    <form class="row" action="../../controllers/empleadoController.php" method="POST">
                        <div class="form-group col-md-12">

                            <?php
                            $Nombres = '';
                            $Apellidos = '';
                            $Correo = '';
                            $Telefono = '';
                            $id = $_GET['idEditar'];
                            $query = sprintf("select * from empleados WHERE id=$id");
                            $result_empleados = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result_empleados)) {
                                $Nombres = $row['Nombres'];
                                $Apellidos = $row['Apellidos'];
                                $Correo = $row['Correo'];
                                $Telefono = $row['Telefono'];
                            }
                            ?>

                                <input type="text" name="Id" class="form-control" value="<?= $id ?>" hidden>
                                <input type="text" name="Nombres" class="form-control" placeholder="Nombres de EMPLEADO" value="<?= $Nombres ?>" required>
                                <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos de EMPLEADO" value="<?= $Apellidos ?>" required>
                                <input type="text" name="Correo" class="form-control" placeholder="Correo de EMPLEADO" value="<?= $Correo ?>" required>
                                <input type="text" name="Telefono" class="form-control" placeholder="Telefono de EMPLEADO" value="<?= $Telefono ?>" required>

                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" name="update_empleado" class="btn btn-primary btn-block">Editar</button>
                            <a href="index.php" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    REGISTRO ACTUAL
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres </th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Fecha de creación</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php
                                $query = sprintf("select * from empleados WHERE id=$id");
                                $result = mysqli_query($conn, $query);
                                mysqli_close($conn);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <tr>
                                    <td><?= $row['Id'] ?></td>
                                    <td><?= $row['Nombres'] ?></td>
                                    <td><?= $row['Apellidos'] ?></td>
                                    <td><?= $row['Correo'] ?></td>
                                    <td><?= $row['Telefono'] ?></td>
                                    <td><?= $row['FechaRegistro'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                            <tr>
                                <th colspan="8" class="text-center">No hay registros... <?php echo $result ?> </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<?php include('../../includes/footer.php') ?>