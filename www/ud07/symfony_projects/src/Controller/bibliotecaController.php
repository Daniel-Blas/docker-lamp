<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class bibliotecaController{

    #[Route('/')]
    public function homepage(){
        return new Response("homepage");
    }

    #[Route('/libros')]
    public function libros(){
        return new Response("Listado de libros");
    }

    #[Route('/contacto')]
    public function contacto(){
        return new Response("Contacto");
    }

}

?>