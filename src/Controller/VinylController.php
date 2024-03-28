<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('Title: PB and Jams');
    }


    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $tittle ='Genre : ' . (str_replace('-', ' ', $slug));
        } else {
            $tittle = 'All Genres';
        }
        return new Response($tittle);
    }
}
