<?php

// Dada la base de datos adjunta "classicmodels", se debe crear una API REST que cumpla las siguientes especificaciones:
//     Tabla customers con la ruta /customers:

require 'flight/Flight.php';
require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=classicmodels','root','test'));
    
//     * GET: Al acceder a esta ruta se debe mostar todos los datos de la tabla. Debes mostrar la información de un único customer a través de su identificador.

// mostrar todos los datos
Flight::route('GET /customers', function () {
    $sentencia = Flight::db()->prepare("SELECT * from customers");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});
// mostrar un único customer
Flight::route('GET /customers/@id', function (string $id) {
    $sentencia = Flight::db()->prepare("SELECT * from customers WHERE customerNumber = ?");
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

    
//     * POST: Se debe poder insertar un customer en la base de datos.
Flight::route('POST /customers', function() {
    $customerNumber = Flight::request()->data->customerNumber;
    $customerName = Flight::request()->data->customerName;
    $contactLastName = Flight::request()->data->contactLastName;
    $contactFirstName = Flight::request()->data->contactFirstName;
    $phone = Flight::request()->data->phone;
    $addressLine1 = Flight::request()->data->addressLine1;
    $addressLine2 = Flight::request()->data->addressLine2;
    $city = Flight::request()->data->city;
    $state = Flight::request()->data->state;
    $postalCode = Flight::request()->data->postalCode;
    $country = Flight::request()->data->country;
    $salesRepEmployeeNumber = Flight::request()->data->sakesRepEmployeeNumber;
    $creditLimit = Flight::request()->data->creditLimit;

    $sentencia = Flight::db()->prepare("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sentencia->bindParam(1, $customerNumber);
    $sentencia->bindParam(2, $customerName);
    $sentencia->bindParam(3, $contactLastName);
    $sentencia->bindParam(4, $contactFirstName);
    $sentencia->bindParam(5, $phone);
    $sentencia->bindParam(6, $addressLine1);
    $sentencia->bindParam(7, $addressLine2);
    $sentencia->bindParam(8, $city);
    $sentencia->bindParam(9, $state);
    $sentencia->bindParam(10, $postalCode);
    $sentencia->bindParam(11, $country);
    $sentencia->bindParam(12, $salesRepEmployeeNumber);
    $sentencia->bindParam(13, $creditLimit);
    $sentencia->execute();

    Flight::jsonp("Customer introducido correctamente");

    
});
    
//     * DELETE: Dado un id se debe poder eliminar un customer.

Flight::route('DELETE /customers/@id', function (string $id) {
    $sentencia = Flight::db()->prepare("DELETE from customers WHERE customerNumber = ?");
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp("Se ha eliminado al customer");
});

    
//     * PUT: Se podrá modificar de un customer su campo phone.
Flight::route('PUT /customers/@id', function (string $id) {
    $phone = Flight::request()->data->phone;
    $sentencia = Flight::db()->prepare("UPDATE customers SET phone = ? WHERE customerNumber = ?");
    $sentencia->bindParam(1, $phone);
    $sentencia->bindParam(2, $id);
    $sentencia->execute();
    Flight::jsonp("Se ha actualizado el teléfono del customer");
});


Flight::start();