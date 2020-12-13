<?php
include("../models/DBCommon.php");
if (isset($_POST['save_rol'])) {
    $NombreRol = $_POST['NombreRol'];
    $query = sprintf("INSERT INTO roles (NombreRol) VALUES('$NombreRol')");
    echo $query;
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        die("Query failed");
    }    
    $_SESSION["message"] = 'Registro guardado';
    $_SESSION["type"] = 'success';

    echo $_SESSION['message'];

    header('Location:../views/roles');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = sprintf("DELETE FROM roles WHERE Id=$id");
    echo $query;
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        die("Query failed");
    } 
    $_SESSION["message"] = 'Registro Eliminado';
    $_SESSION["type"] = 'danger';

    echo $_SESSION['message'];

    header('Location:../views/roles');
}


if (isset($_POST['update_rol'])) {
    $Id = $_POST['Id'];
    $NombreRol = $_POST['NombreRol'];
    $query = sprintf("UPDATE  roles SET NombreRol='$NombreRol'  WHERE Id=$Id");
    echo $query;
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        die("Query failed");
    }    
    $_SESSION["message"] = 'Registro Modificado';
    $_SESSION["type"] = 'success';

    echo $_SESSION['message'];

    header('Location:../views/roles');
}

?>