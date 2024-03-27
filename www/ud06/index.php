<?php

// require 'flight/Flight.php';
require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas','root','test'));


// Tabla clientes
// id, nombre, apellidos, edad, email, telefono

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
Flight::route('DELETE /clientes/@id', function(string $id){
    $sql = "DELETE FROM clientes WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp("El cliente con id $id ha sido eliminado");
});

// Modificar un cliente sus apellido, edad, email y teléfono
Flight::route('PUT /clientes/@id', function(string $id){
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


// Tabla hoteles
// id, hotel, direccion, telefono, email

// Información de todos los hoteles
Flight::route('GET /hoteles', function(){
    $sentencia = Flight::db()->prepare("SELECT * from hoteles");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Obtener la información de un hotel en concreto
Flight::route('GET /hoteles/@id', function (int $id) {
    $sentencia = Flight::db()->prepare("SELECT * from hoteles WHERE id = ?");
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Insertar un hotel
Flight::route('POST /hoteles', function(){
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO hoteles(hotel, direccion, telefono, email) VALUES(?, ?, ?, ?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $hotel);
    $sentencia->bindParam(2, $direccion);
    $sentencia->bindParam(3, $telefono);
    $sentencia->bindParam(4, $email);

    $sentencia->execute();
    Flight::jsonp("Hotel agregado con éxito");
});

// Borrar un hotel dado un id
Flight::route('DELETE /hoteles/@id', function(string $id){
    $sql = "DELETE FROM hoteles WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp("El hotel con id $id ha sido eliminado");
});

// Modificar un hotel su dirección, email y teléfono
Flight::route('PUT /hoteles/@id', function(string $id){
    $direccion = Flight::request()->data->direccion;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE hoteles SET direccion = ?, email = ?, telefono = ? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $direccion);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $telefono);
    $sentencia->bindParam(4, $id);

    $sentencia->execute();
    Flight::jsonp("Hotel actualizado con éxito");
});


// Tabla reservas
// id, id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida

// Información de todas las reservas
Flight::route('GET /reservas', function(){
    $sentencia = Flight::db()->prepare("SELECT * from reservas");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Obtener la información de una reserva en concreto
Flight::route('GET /reservas/@id', function (int $id) {
    $sentencia = Flight::db()->prepare("SELECT * from reservas WHERE id = ?");
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Insertar una reserva
Flight::route('POST /reservas', function(){
    $idCliente = Flight::request()->data->id_cliente;
    $idHotel = Flight::request()->data->id_hotel;
    $fechaReserva =  date("Y-m-j");
    $fechaEntrada = Flight::request()->data->fecha_entrada;
    $fechaSalida = Flight::request()->data->fecha_salida;

    $sentenciaCliente = Flight::db()->prepare("SELECT * from clientes WHERE id = ?");
    $sentenciaCliente->bindParam(1, $idCliente);
    $sentenciaCliente->execute();
    $sentenciaHotel = Flight::db()->prepare("SELECT * from hoteles WHERE id = ?");
    $sentenciaHotel->bindParam(1, $idHotel);
    $sentenciaHotel->execute();
    if (sizeof($sentenciaCliente->fetchAll()) != 0 && sizeof($sentenciaHotel->fetchAll()) !=0){
        $sql = "INSERT INTO reservas(id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida) VALUES(?, ?, ?, ?, ?)";
        $sentencia = Flight::db()->prepare($sql);
        $sentencia->bindParam(1, $idCliente);
        $sentencia->bindParam(2, $idHotel);
        $sentencia->bindParam(3, $fechaReserva);
        $sentencia->bindParam(4, $fechaEntrada);
        $sentencia->bindParam(5, $fechaSalida);
        $sentencia->execute();
        Flight::jsonp("La reserva se ha efectuado");

    } else {
        Flight::jsonp("No se ha encontrado el cliente o el hotel, no se ha podido introducir la reserva");
    }
});

// Borrar una reserva dado un id
Flight::route('DELETE /reservas/@id', function(string $id){
    $sql = "DELETE FROM reservas WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp("La reserva con id $id ha sido eliminado");
});


// Modificar una reserva su fecha de entrada y de salida
Flight::route('PUT /reservas/@id', function(string $id){
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    $sql = "UPDATE reservas SET fecha_entrada = ?, fecha_salida = ? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $fecha_entrada);
    $sentencia->bindParam(2, $fecha_salida);
    $sentencia->bindParam(3, $id);

    $sentencia->execute();
    Flight::jsonp("Reserva actualizado con éxito");
});

Flight::start();
