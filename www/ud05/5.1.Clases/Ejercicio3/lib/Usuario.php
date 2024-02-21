<?php

class Usuario{

    // Propiedades
    private $nombre;
    private $apellidos;
    private $edad;
    private $provincia;

    // Getters y Setters
    function getNombre(){
        return $this->nombre;
    }
    function getApellidos(){
        return $this->apellidos;
    }
    function getEdad(){
        return $this->edad;
    }
    function getProvincia(){
        return $this->provincia;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    function setEdad($edad){
        $this->edad = $edad;
    }
    function setProvincia($provincia){
        if ($provincia == "corunha" || $provincia == "lugo" || $provincia == "ourense" || $provincia == "pontevedra") {
            $this->provincia = $provincia;
        } else {
            // Si se intenta introducir un dato no admitido asignamos la provincia por defecto
            $this->provincia = "corunha";
        }
    }


    // Constructor
    function __construct($nombre, $apellidos, $edad, $provincia){
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setEdad($edad);
        $this->setProvincia($provincia);
    }

    
    
}