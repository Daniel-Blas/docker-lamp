<?php

class Empleado {

    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    // Constructor
    function __construct($nombre, $salario){
        self::$numEmpleados ++;
        $this->nombre = $nombre;
        $salario>2000?$this->salario = 2000:$this->salario = $salario;
    }

    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre=$nombre;  
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getSalario(){
        return $this->salario;
    }
}