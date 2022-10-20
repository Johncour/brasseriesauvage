<?php

namespace App\Controller;

use App\Repository\BeerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BeerController extends AbstractController
{
    #[Route('/beer', name: 'app_beer', methods: ['GET', 'POST'])]
    public function index(BeerRepository $beerRepository): Response
    {
        $numberBeer = $beerRepository->findAll();
        $nBeer = count($numberBeer);
        return $this->render('beer/index.html.twig', [
            "beers" => $beerRepository->findAll(),
            'nBeer' => $nBeer
        ]);
    }
}
