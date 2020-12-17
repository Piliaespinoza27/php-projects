<?php include('../../includes/header.php') ?>
<?php include('../../includes/navbar.php') ?>
<?php include('../../models/DBCommon.php') ?>



<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Usuarios</h1>
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
                <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" usuarios="alert">
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
                    NUEVOS USUARIOS
                </div>
                <div class="card-body">
                    <form class="row" action="../../controllers/usuarioController.php" method="POST">
                    <div class="form-group col-md-12">
                            <select name="IdRol" class="form-control">
                            <?php
                                    $query = sprintf("select * from roles");
                                    $result_usuario = mysqli_query($conn, $query);
                                
                                    while ($row = mysqli_fetch_array($result_usuario)) {
                                    ?>

                                    
                                        <option value="<?= $row['Id']?>"><?= $row['Id'] ?> - <?= $row['NombreRol'] ?></option>
                                  
                                       
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select name="IdEmpleado" class="form-control">
                                <?php
                                $query = sprintf("select * from empleados");
                                $result_usuario = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_array($result_usuario)) {
                                ?>

                                
                                    <option value="<?= $row['Id'] ?>"><?= $row['Id'] ?> - <?= $row['Nombres'] ?> <?= $row['Apellidos'] ?> </option>
                              
                                   
                                <?php
                                }
                                ?>
                        </select>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="NombreUsuario" class="form-control" placeholder="Nombre Usuario" required>
                            
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="Clave" class="form-control" placeholder="Clave" require>
                        </div>
                       
                        <div class="form-group col-md-12">
                            <button type="submit" name="save_usuario" class="btn btn-primary btn-block">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                 USUARIOS
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id Rol</th>
                                <th>Id Empleados</th>
                                <th>Nombre Usuario</th>
                                <th>Contraseña</th>
                                <th>Fecha de creación</th>
                                <th>Opciones</th>
                            </tr>

                        </thead>
                        <tbody>
                             <?php
                            $query = sprintf("select * from usuarios");
                            $result_usuario = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result_usuario)) {
                            ?>

                                <tr>
                                    <td>
                                        <?= $row['Id'] ?>
                                    </td>
                                    <td>
                                        <?= $row['IdRol'] ?>
                                    </td>
                                    <td>
                                        <?= $row['IdEmpleados'] ?>
                                    </td>
                                    <td>
                                        <?= $row['NombreUsuario'] ?>
                                    </td>
                                        <td>**********</td>
                                    <td>
                                        <?= $row['FechaRegistro'] ?>
                                    </td>
                                    <td>
                                        <a href="update.php?idEditar=<?=$row['Id']?>">Editar</a>
                                        -
                                        <a href="../../controllers/usuarioController.php?id=<?=$row['Id']?>">Eliminar</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>

                            <tr>
                                <th colspan="8" class="text-center">No hay registros... <?php echo $result?> </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../../includes/footer.php') ?>