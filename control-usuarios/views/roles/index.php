<?php include('../../includes/header.php') ?>
<?php include('../../includes/navbar.php') ?>
<?php include('../../models/DBCommon.php') ?>



<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Roles</h1>
                <p class="lead">
                    This is a modified jumbotron that occupies the entire horizontal space of its parent.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">


        <?php if (isset($_SESSION['message'])) { ?>
            <div class="col-md-12">
                <div class="alert alert-<?= $_SESSION["type"] ?> alert-dismissible fade show" role="alert">
                    <strong>
                        <?= $_SESSION["message"] ?>
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php session_unset();
        } ?>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    NUEVO ROL DE USUARIOS
                </div>
                <div class="card-body">
                    <form class="row" action="../../controllers/rolController.php" method="POST">
                        <div class="form-group col-md-12">
                            <input type="text" name="NombreRol" class="form-control" placeholder="Nombre de ROL" required>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" name="save_rol" class="btn btn-primary btn-block">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ROLES DE USUARIOS
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre ROL</th>
                                <th>Fecha de creación</th>
                                <th>Opciones</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("select * from roles");
                            $result = mysqli_query($conn, $query);
                            mysqli_close($conn);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>

                                <tr>
                                    <td><?= $row['Id'] ?></td>
                                    <td><?= $row['NombreRol'] ?></td>
                                    <td><?= $row['FechaRegistro'] ?></td>
                                    <td>
                                        <a href="update.php?idEditar=<?=$row['Id']?>">Editar</a>
                                        -
                                        <a href="../../controllers/rolController.php?id=<?=$row['Id']?>">Eliminar</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>

                            <tr>
                                <th colspan="4" class="text-center">No hay registros... <?php echo $result?> </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../../includes/footer.php') ?>