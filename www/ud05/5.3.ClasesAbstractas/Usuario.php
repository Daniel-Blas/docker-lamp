<?php
include_once "./Persona.php";

class Usuario extends Persona {
  
    function getNombre(){
        return $this->nombre;
    }
    function getApellidos(){
        return $this->apellidos;
    }

  
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    function __construct($nombre, $apellidos){
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
    }

    function accion(){
        echo "La persona " . $this->getNombre() . " " . $this->getApellidos() . " es un Usuario.</br>";
    }
}