<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Psr\Cache\CacheItemInterface;

class bibliotecaController extends AbstractController
{

    #[Route('/')]
    public function homepage()
    {
        return $this->render('biblioteca/homepage.html.twig', ['title' => 'Biblioteca']);
    }

    #[Route('/libros')]
    public function libros(HttpClientInterface $httpClient, CacheInterface $cache, string $slug = null): Response
    {
        $libros = $cache->get('libros_data', function (CacheItemInterface $cacheItem) use ($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/Daniel-Blas/libros/main/libros.json');
            $cacheItem->expiresAfter(10);
            return $response->toArray();
        });

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
