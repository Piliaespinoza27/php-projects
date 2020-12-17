<?php
include("../models/DBCommon.php");
if (isset($_POST['save_empleado'])) {
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo'];
    $Telefono = $_POST['Telefono'];
    $query = sprintf("INSERT INTO empleados (Nombres, Apellidos, Correo, Telefono) VALUES('$Nombres', '$Apellidos', '$Correo', '$Telefono')");
    echo $query;
    $result_empleado = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result_empleado) {
        die("Query failed");
    }    
    $_SESSION["message"] = 'Registro guardado';
    $_SESSION["message_type"] = 'success';


    header('Location:../views/empleados');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = sprintf("DELETE FROM empleados WHERE Id=$id");
    echo $query;
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        die("Query failed");
    } 
    $_SESSION["message"] = 'Registro Eliminado';
    $_SESSION["type"] = 'danger';

    echo $_SESSION['message'];

    header('Location:../views/empleados');
}


if (isset($_POST['update_empleado'])) {
    $Id = $_POST['Id'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo'];
    $Telefono = $_POST['Telefono'];
    $query = sprintf("UPDATE  empleados SET Nombres='$Nombres', Apellidos='$Apellidos', Correo='$Correo', Telefono='$Telefono'  WHERE Id=$Id");
    echo $query;
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    if (!$result) {
        die("Query failed");
    }    
    $_SESSION["message"] = 'Registro Modificado';
    $_SESSION["type"] = 'success';

    echo $_SESSION['type'];

    header('Location:../views/empleados');
}

?>