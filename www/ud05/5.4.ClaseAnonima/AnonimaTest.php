<?php



// Utilizando una clase anónima crea diferentes objetos con los siguientes requisitos:

//     La clase tiene dos propiedades:
//     $base
//     $altura
//     La clase tiene dos métodos:
//     area(): devolve la (base * altura) / 2 .
//     perimetro(): devolve la 2 * base + 2 * altura .
//     Realiza todo esto en un fichero AnonimaTest.php.

$triangulo = new class(3, 7){
    public $base;
    public $altura;

    function __construct($base, $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }

    function area(){
        return ($this->base * $this->altura) / 2;
    }
    function perimetro(){
        return ($this->base *2) + ($this->altura *2);
    }
};

echo "El area de un triángulo de base " . $triangulo->base . " y altura " . $triangulo->altura . " es " . $triangulo->area() ."</br>";

$rectangulo = new class(8, 5){
    public $base;
    public $altura;

    function __construct($base, $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }

    function area(){
        return ($this->base * $this->altura) / 2;
    }
    function perimetro(){
        return ($this->base *2) + ($this->altura *2);
    }
};

echo "El perímetro de un rectángulo de base " .$rectangulo->base . " y altura " . $rectangulo->altura . " es " . $rectangulo->perimetro();
