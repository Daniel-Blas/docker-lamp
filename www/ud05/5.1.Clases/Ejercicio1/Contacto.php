<?php
/*
 *
 * Clase contacto que almacena un nome, apelidos e un número
 * @author Daniel Blas <a22carlosba@iessanclemente.net>
 * 
*/


class Contacto {
    private $nombre;
    private $apellidos;
    private $numero;

    // Constructor
    function __construct($nombre, $apellidos, $numero){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numero = $numero;
    }

    // Getters
    function get_nombre(){
        return $this->nombre;
    }
    function get_apellidos(){
        return $this->apellidos;
    }
    function get_numero(){
        return $this->numero;
    }

    // Setters
    function set_nombre($n){
        $this->nombre = $n;
    }
    function set_apellidos($a){
        $this->apellidos = $a;
    }
    function set_numero($num){
        $this->numero = $num;
    }

    // Función para mostrar os datos
    function muestraInformacion(){
        echo "Nombre: " . $this->get_nombre(). "</br>";
        echo "Apellidos: " . $this->get_apellidos() . "</br>";
        echo "Numero: " . $this->get_numero() . "</br>";
    }

    function __destruct()
    {
        echo 'Se ha destruido este contacto: </br>';
        $this->muestraInformacion();
    }
}
?>