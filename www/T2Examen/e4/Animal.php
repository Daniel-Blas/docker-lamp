<?php
require_once "Mascota.php";

abstract class Animal implements Mascota{
    protected $nombre;
    protected $edad;

    // Constructor
    function __construct($nombre, $edad){
        $this->set_nombre($nombre);
        $this->set_edad($edad);
    }

    // Getters
    function get_nombre(){
        return $this->nombre;
    }
    function get_edad(){
        return $this->edad;
    }

    // Setters
    function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    function set_edad($edad){
        $this->edad = $edad;
    }

    function obtenerNombre(){
        return $this->get_nombre();
    }

    abstract function emitirSonido();
}

?>