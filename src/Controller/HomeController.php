<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $arrow = $request->query->get('arrow');
        $word = $request->query->get('animation');
        $topSize = [-10,-50,-20,-15,-40,-30,-5,-10,-50,-20,-40,-15,-30,-5,-10,-50,-20,-40,-15,-30 ,-5,-10,-50,-20,-40,-15,-30,-5,-10,-50,-20,-40,-15,-30,-5,-10,-50,-20,-40,-15,-30,-5];
        $leftSize = [0,14.3,57.2,28.6,71.5,42.9,85.8,5,19.3,62.2,32.6,75.5,47.9,89.8,10,24.3,67.2,37.6,80.5,52.9,94.8,0,14.3,57.2,28.6,71.5,42.9,85.8,5,19.3,62.2,32.6,75.5,47.9,89.8,10,24.3,67.2,37.6,80.5,52.9,94.8];
        return $this->render('home/index.html.twig', [
            'topSize' => $topSize,
            'leftSize' => $leftSize,
            'word' => $word,
            'arrow' => $arrow
        ]);
    }

    #[Route('/mentions', name: 'app_mentions', methods: ['GET'])]
    public function mentions(Request $request): Response
    {
        return $this->render('home/mentions.html.twig');
    }
}
