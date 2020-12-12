<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "angelitho22", "mvc");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
