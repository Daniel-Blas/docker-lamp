<?php

// require 'flight/Flight.php';
require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas','root','test'));


// Tabla clientes

// Obtener la información de todos los clientes
Flight::route('GET /clientes', function () {
    $sentencia = Flight::db()->prepare("SELECT * from clientes");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Obtener la información de un cliente en concreto
Flight::route('GET /clientes/@id', function (int $id) {
    $sentencia = Flight::db()->prepare("SELECT * from clientes WHERE id = ?");
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Insertar un cliente
Flight::route('POST /clientes', function(){
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO clientes(nombre, apellidos, edad, email, telefono) VALUES(?, ?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $apellidos);
    $sentencia->bindParam(3, $edad);
    $sentencia->bindParam(4, $email);
    $sentencia->bindParam(5, $telefono);

    $sentencia->execute();
    Flight::jsonp("Cliente agregado con éxito");
});

// Borrar un cliente dado un id
Flight::route('DELETE /clientes', function(){
    $id = Flight::request()->data->id;
    $sql = "DELETE FROM clientes WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp("El cliente con id $id ha sido eliminado");
});

// Modificar un cliente sus apellido, edad, email y teléfono
Flight::route('PUT /clientes', function(){
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE clientes SET apellidos = ?, edad = ?, email = ?, telefono = ? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $apellidos);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);
    $sentencia->bindParam(5, $id);

    $sentencia->execute();
    Flight::jsonp("Cliente actualizado con éxito");
});


Flight::start();
