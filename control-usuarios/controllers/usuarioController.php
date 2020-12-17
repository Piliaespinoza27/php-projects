<?php
include("../models/DBCommon.php");
if (isset($_POST['save_usuario'])) {
    $IdRol = $_POST['IdRol'];
    $IdEmpleados = $_POST['IdEmpleados'];
    $NombreUsuario = $_POST['NombreUsuario'];
    $Clave =$_POST['Clave'];

    $query = sprintf("INSERT INTO usuarios (IdRol, IdEmpleados, NombreUsuario, Clave) VALUES('$IdRol', '$IdEmpleados', '$NombreUsuario', '$Clave')");
    $result_usuarios = mysqli_query($conn, $query);
    if (!$result_usuarios) {
        die("Query failed");
    }    
    $_SESSION["message"] = 'Registro guardado';
    $_SESSION["message_type"] = 'success';


    header('Location:../views/usuarios');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = sprintf("DELETE FROM usuarios WHERE Id=$id");
    echo $query;
    $result_usuarios = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result_usuarios) {
        die("Query failed");
    } 
    $_SESSION["message"] = 'Registro Eliminado';
    $_SESSION["type"] = 'danger';

    echo $_SESSION['message'];

    header('Location:../views/usuarios');
}


if (isset($_POST['update_usuario'])) {
    $Id = $_POST['Id'];
    $IdRol = $_POST['IdRol'];
    $IdEmpleados = $_POST['IdEmpleados'];
    $NombreUsuario = $_POST['NombreUsuario'];
    $Clave = $_POST['Clave'];
    $query = sprintf("UPDATE  usuarios SET IdRol='$IdRol', IdEmpleados='$IdEmpleados', NombreUsuario='$NombreUsuario', Clave='$Clave'  WHERE Id=$Id");
    echo $query;
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        die("Query failed");
    }    
    $_SESSION["message"] = 'Registro Modificado';
    $_SESSION["type"] = 'success';

    echo $_SESSION['type'];

    header('Location:../views/usuarios');
}

?>