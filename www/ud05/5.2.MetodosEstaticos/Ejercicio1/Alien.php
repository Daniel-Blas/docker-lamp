<?php

class Alien {
    // Atributo
    static $numberOfAliens = 0;
    private $nombre;

    // Getter y Setter
    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNumberOfAliens(){
        return self::$numberOfAliens;
    }

    // Constructor
    function __construct($nombre){
        $this->setNombre($nombre);
        self::$numberOfAliens++;
    }


}