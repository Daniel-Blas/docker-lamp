<?php

class Participante{
    private $nombre;
    private $edad;

    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setEdad($edad){
        $this->edad = $edad;
    }

    function getNombre(){
        return $this->nombre;
    }
    function getEdad(){
        return $this->edad;
    }

    function __construct($nombre, $edad){
        $this->setNombre($nombre);
        $this->setEdad($edad);        
    }
    function __destruct()
    {
        echo $this->getNombre() . " ha sido eliminado.</br>";
    }

    function mostrar(){
        echo $this->getNombre() . ", " . $this->getEdad();
    }
}