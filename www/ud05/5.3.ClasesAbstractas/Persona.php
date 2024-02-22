<?php

abstract class Persona {
    // propiedades
    private $id;
    protected $nombre;
    protected $apellidos;

    // Métodos abstractos
    abstract function getNombre();
    abstract function getApellidos();

    abstract function setNombre($nombre);
    abstract function setApellidos($apellidos);

    abstract function __construct($nombre, $apellidos);

    abstract function accion();
}