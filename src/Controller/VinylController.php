<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gansta\'s Paradise', 'artist'=> 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist'=> 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist'=>' Seal'],
            ['song' => 'On Bended Knee', 'artist'=>'Boyz II Men'],
            ['song' => 'Fantasy ','artist'=>' Mariah Carey'],
        ];
        dump($tracks); //mejor sale abajo en la consola
       return $this->render('vinyl/homepage.html.twig', [ // render() method is inherited from AbstractController Y bueno tambien el nombre vinyl debe coincidir con el controlador y que homepage debe coincidir a dodne deberia ir
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]); 

    }
    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
        //return new Response('Breakup vinyl? Angsty 90s rock? Browse the collection!');
    }
}
