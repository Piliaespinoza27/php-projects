<?php include('../../includes/header.php') ?>
<?php include('../../includes/navbar.php') ?>
<?php include('../../models/DBCommon.php') ?>


<?php if (isset($_GET['idEditar'])) { ?>

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Modificar Usuario</h1>
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
                        MODIFICAR USUARIO
                    </div>
                    <div class="card-body">
                        <form class="row" action="../../controllers/usuarioController.php" method="POST">
                            <div class="form-group col-md-12">

                                <?php
                                $valor = '';
                                $id = $_GET['idEditar'];
                                $query = sprintf("select * from usuarios WHERE id=$id");
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $valor = $row['IdRol'];
                                    $valor = $row['IdEmpleados'];
                                    $valor = $row['NombreUsuario'];
                                    $valor = $row['Clave'];
                                }
                                ?>

                                    <input type="text" name="Id" class="form-control" value="<?= $id ?>" hidden>
                                    <input type="text" name="IdRol" class="form-control" placeholder="ID ROL" value="<?= $valor ?>" required>
                                    <input type="text" name="IdEmpleados" class="form-control" placeholder="ID EMPLEADO" value="<?= $valor ?>" required>
                                    <input type="text" name="NombreUsuario" class="form-control" placeholder="NOMBRE USUARIO" value="<?= $valor ?>" required>
                                    <input type="text" name="Clave" class="form-control" placeholder="CLAVE" value="<?= $valor ?>" required>

                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="update_usuario" class="btn btn-primary btn-block">Editar</button>
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
                                <th>Id Rol</th>
                                <th>Id Empleados</th>
                                <th>Nombre Usuario</th>
                                <th>Clave</th>
                                <th>Fecha de creación</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $query = sprintf("select * from usuarios WHERE id=$id");
                                $result = mysqli_query($conn, $query);
                                mysqli_close($conn);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><?= $row['Id'] ?></td>
                                        <td><?= $row['IdRol'] ?></td>
                                        <td><?= $row['IdEmpleados'] ?></td>
                                        <td><?= $row['NombreUsuario'] ?></td>
                                        <td><?= $row['Clave'] ?></td>
                                        <td><?= $row['FechaRegistro'] ?></td>
                                    </tr>

                                <?php
                                }
                                ?>

                                <tr>
                                    <th colspan="4" class="text-center">No hay registros... <?php echo $result ?> </th>
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