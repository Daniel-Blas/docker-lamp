<?php

function get_conexion(){
    //Código para establecer á conexión
    @$conexion = new mysqli('db', 'root', 'test', 'tienda');
    
    $error = $conexion->connect_errno;
    if($error !=null){
        die("Fallo en la conexión: ".$conexion->connect_error."Con numero". $error);
    }
    // echo "Conexión correcta";
    return $conexion;
}

function seleccionar_bd_tienda($conexion){
    $conexion->select_db('tienda');
}
function crear_bd_tienda($conexion){
    //Código para creación de bd
    seleccionar_bd_tienda($conexion);
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if($conexion->query($sql)){
        // echo "Base de datos creada correctamente";
    }else{
        echo "Error creando la base de datos".$conexion->error;
    }
}

function crear_tabla_usuario($conexion){
    seleccionar_bd_tienda($conexion);
    $sql = "CREATE TABLE IF NOT EXISTS usuarios(id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50), apellidos VARCHAR(100), edad INT, provincia VARCHAR(50))";
    if ($conexion->query($sql)){
        // echo "Tabla creada con exito";
    } else {
        echo "Error creando tabla".$conexion->error;
    }
}
