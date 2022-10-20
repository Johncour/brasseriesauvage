<?php

namespace App\Controller;

use App\Repository\BeerRepository;
use App\Repository\ShopBeerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'app_shop', methods: ['GET', 'POST'])]
    public function index(BeerRepository $beerRepository, Request $request): Response
    {
        $numberBeer = $beerRepository->findAll();
        $nBeer = count($numberBeer);
        $quantity = $request->query->get('quantity');
        $bid = $request->query->get('bid');
        $price = $request->query->get('price');
        // echo "<pre>";
        //     print_r($quantity);
        // echo "<pre>";
        return $this->render('shop/index.html.twig', [
            "beers" => $beerRepository->findAll(),
            'nBeer' => $nBeer,
            'quantity' => $quantity,
            'bid' => $bid,
            'price' => $price
        ]);
    }

    // #[Route('/shop/{id}/{quantity}', name: 'app_shop_fromBeer', methods: ['GET', 'POST'])]
    // public function goShop(BeerRepository $beerRepository, Request $request, $id, $quantity): Response
    // {
    //     echo "<pre>";
    //         print_r('hello');
    //     echo "</pre>";
    //     // $id = $request->query->get('id');
    //     // $quantity = $request->query->get('quantity');
    //     return $this->render('shop/index.html.twig', [
    //         "beers" => $beerRepository->findAll(),
    //         'nBeer' => $nBeer,
    //         'quantities' => $quantity,
    //         'id' => $id
    //     ], Response::HTTP_SEE_OTHER);
    // }

    // #[Route('/shop/{price}/{quantity}', name: 'app_shop_fromBeer', methods: ['GET', 'POST'])]
    // public function fromBeer(BeerRepository $beerRepository, $price, $quantity): Response
    // {
    //     $numberBeer = $beerRepository->findAll();
    //     $nBeer = count($numberBeer);
    //     return $this->render('shop/index.html.twig', [
    //         "beers" => $beerRepository->findAll(),
    //         'nBeer' => $nBeer
    //     ]);
    // }

    // #[Route('/shop/{id}/{quantity}/{price}', name: 'app_shop_add_basket', methods: ['GET', 'POST'])]
    // public function addBasket(BeerRepository $beerRepository, ShopBeerRepository $shopBeerRepository, EntityManagerInterface $em, Request $request, $id, $quantity, $price): Response
    // {
    //     echo "<pre>";
    //         print_r($quantity);
    //     echo "</pre>";
    //     $sb = new ShopBeer;
    //     $beer = $beerRepository->find($id);
    //     $beerId = $beer->getId();
    //     $sb->setBeer($beerId);
    //     $sb->setShop(0);
    //     $sb->setQuantity($quantity);
    //     $sb->setPriceQuantity($price);
    //     $em->persist($sb);
    //     $em->flush();
    //     return $this->redirectToRoute('app_shop_add_basket', [
    //         "shopBeers" => $shopBeerRepository->findAll()
    //     ], Response::HTTP_SEE_OTHER);  
    // }
}
