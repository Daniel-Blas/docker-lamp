<?php

function get_conexion(){
    //Código para establecer á conexión
    try {
        $servername = "db";
        $username = "root";
        $password = "test";
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS donacion";
        $conn->exec($sql);
        return $conn;
    } catch(PDOException $e) {
        echo "error".$e->getMessage();
    }
}


function crear_bd_donacion($conexion){
    //Código para creación de bd
    seleccionar_bd_donacion($conexion);
    $sql = "CREATE DATABASE IF NOT EXISTS donacion";
    $conexion->exec($sql);
}
function crear_tabla_donantes($conexion){
    seleccionar_bd_donacion($conexion);
    $sql = "CREATE TABLE IF NOT EXISTS donantes(id VARCHAR(9) PRIMARY KEY, nombre VARCHAR(50), apellidos VARCHAR(100), edad INT, grupo_sanguineo SET('0-', '0+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'), codigo_postal INT(5), telefono int(9))";
    $conexion->exec($sql);
}
function crear_tabla_historico($conexion){
    seleccionar_bd_donacion($conexion);
    $sql = "CREATE TABLE IF NOT EXISTS historico(donante VARCHAR(9), fecha_donacion DATE, fecha_proxima_donacion DATE)";
    $conexion->exec($sql);

}
function crear_tabla_administradores($conexion){
    seleccionar_bd_donacion($conexion);
    $sql = "CREATE TABLE IF NOT EXISTS administradores(nombre_usuario VARCHAR(50) PRIMARY KEY, contrasena VARCHAR(50))";
    $conexion->exec($sql);
}



function seleccionar_bd_donacion($conexion){
    $conexion->exec('USE donacion');
}


?>