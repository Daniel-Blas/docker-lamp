<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class bibliotecaController extends AbstractController
{

    #[Route('/')]
    public function homepage()
    {
        return $this->render('biblioteca/homepage.html.twig', ['title' => 'Biblioteca']);
    }

    #[Route('/libros')]
    public function libros()
    {
        $libros = [
            ['nombre' => "El capitán Alatriste", 'autor' => "Pérez-Reverte"],
            ['nombre' => "Os dous de sempre", 'autor' => "Castelao"],
            ['nombre' => "El halcón maltes", 'autor' => "Dashiel Hammett"],
            ['nombre' => "Rescate en el tiempo", 'autor' => "Michael Crichton"],

        ];
        return $this->render('biblioteca/libros.html.twig', [
            'title' => 'Libros',
            'libros' => $libros
        ]);
    }

    #[Route('/contacto')]
    public function contacto()
    {
        return $this->render('biblioteca/contacto.html.twig', ['title' => 'Contacto']);
    }
}
