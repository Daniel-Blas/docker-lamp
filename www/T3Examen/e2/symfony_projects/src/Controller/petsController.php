<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
// use Psr\Cache\CacheItemInterface;

class petsController extends AbstractController {

    #[Route('/pets')]
    public function pets(HttpClientInterface $httpClient){
        $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/Daniel-Blas/docker-lamp/main/www/T3Examen/pets.json');
        $pets = $response->toArray();


        return $this->render('pets.html.twig', [
            'title' => 'Pets',
            'pets' => $pets
        ]);
    }


    #[Route('/petscache')]
    public function petscache(HttpClientInterface $httpClient, CacheInterface $cache){
        $pets = $cache->get('pets', function(CacheItemInterface $cacheItem) use ($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/Daniel-Blas/docker-lamp/main/www/T3Examen/pets.json');
            $cacheItem->expiresAfter(2);
            return $response->toArray();
        });


        return $this->render('pets.html.twig', [
            'title' => 'Pets',
            'pets' => $pets
        ]);
    }

}