<?php

require_once "./Participante.php";

class Jugador extends Participante {
    private $posicion;

    function setPosicion($posicion){
        $this->posicion = $posicion;
    }
    function getPosicion(){
        return $this->posicion;
    }

    function __construct($nombre, $edad, $posicion)
    {
        parent::__construct($nombre, $edad);
        $this->setPosicion($posicion);
        
    }

    function mostrar(){
        parent::mostrar();
        echo " " . $this->getPosicion() . ".</br>";
    }
}