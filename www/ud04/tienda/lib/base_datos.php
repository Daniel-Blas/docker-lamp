<?php

function get_conexion()
{
    $conexion = new mysqli('db', 'root', 'test');
  
    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }
    
    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    return $conexion->select_db("tienda");
}

function ejecutar_consulta($conexion, $sql)
{
    $resultado = $conexion->query($sql);

    if ($resultado == false) {
        die($conexion->error);
    }

    return $resultado;
}

function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_usuarios($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL ,
          pass VARCHAR(255) NOT NULL,
          apellidos VARCHAR(100) NOT NULL ,
          edad INT (3) NOT NULL ,
          provincia VARCHAR(50) NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}


function crear_tabla_productos($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS productos(
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL , 
          descripcion VARCHAR(100) NOT NULL ,
          precio FLOAT (3) NOT NULL ,
          unidades FLOAT (3) NOT NULL,
          foto BLOB NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}

function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}
 
function get_usuario($conexion, $id)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{
    $sql = "UPDATE usuarios
            SET nombre='$nombre' ,apellidos='$apellidos' ,edad='$edad',provincia='$provincia'
            WHERE id=$id;";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}


function dar_alta_usuario($conexion, $nombre, $pass, $apellidos, $edad, $provincia)
{
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,pass,apellidos,edad,provincia) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $nombre, $pass, $apellidos, $edad, $provincia);
    return $sql->execute() or die($conexion->error);
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function introducir_producto($conexion, $nombre, $descripcion, $precio, $unidades, $foto){
    $sql = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades, foto) VALUES (?,?,?,?, ?)");
    $reference = file_get_contents($foto);
    $sql->bind_param("ssdds", $nombre, $descripcion, $precio, $unidades, $reference);
    return $sql->execute() or die($conexion->error);
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}


// funciones login

function buscarUsuario($nombre){
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    $sql = "SELECT COUNT(id) AS cantidad
            FROM usuarios
            WHERE nombre ='$nombre' ";
    $resultado = ejecutar_consulta($conexion, $sql);
    if($resultado->fetch_assoc()["cantidad"] != "0"){
           return true;
    } else {
        return false;
    }
    
}

function contrasenha($usuario){
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    $sql = "SELECT pass
            FROM usuarios
            WHERE nombre ='$usuario'";

    $resultado = ejecutar_consulta($conexion, $sql)->fetch_assoc()["pass"];
    return $resultado;
}
