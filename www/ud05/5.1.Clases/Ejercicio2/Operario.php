<?php
require "Empleado.php";
class Operario extends Empleado {
    // Propiedades
    private $turno;

    // Constructor
    function __construct($nombre, $salario){
        parent::__construct($nombre, $salario);
        $this->turno = "diurno";
    }

    // Getter
    function getTurno(){
        return $this->turno;
    }

    // Setter
    function setTurno($turno){
        if ($turno == "diurno" || $turno == "nocturno")
                $this->turno = $turno;
    }
}