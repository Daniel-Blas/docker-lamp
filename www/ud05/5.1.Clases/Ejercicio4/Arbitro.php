<?php
require_once "./Participante.php";

class Arbitro extends Participante {
    private $anhos;

    function setAnhos($anhos){
        $this->anhos = $anhos;
    }
    function getAnhos(){
        return $this->anhos;
    }

    function __construct($nombre, $edad, $anhos)
    {
        parent::__construct($nombre, $edad);
        $this->setAnhos($anhos);
    }

    function mostrar(){
        parent::mostrar();
        echo ", arbitro, " . $this->getAnhos() . " años arbitrando.</br>";
    }
}