<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\BeerRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/beer/{id}', name: 'app_beer_favoris', methods: ['GET', 'POST'], requirements: ['id' => '[0-9]+'])]
    public function favoris(BeerRepository $beerRepository, UserRepository $ur, Request $request, EntityManagerInterface $em, $id): Response
    {
        $useId = $request->query->get('user');
        $heart = $request->query->get('heart');
        if($heart == 1){
            $user = $ur->find($useId);
            $beer = $beerRepository->find($id);
            $user->addFavori($beer);
            $em->flush();
        } else {
            $user = $ur->find($useId);
            $beer = $beerRepository->find($id);
            $user->removeFavori($beer);
            $em->flush();
        }
        $numberBeer = $beerRepository->findAll();
        $nBeer = count($numberBeer);
        return $this->render('beer/index.html.twig', [
            "beers" => $beerRepository->findAll(),
            'nBeer' => $nBeer
        ]);
    }
}
