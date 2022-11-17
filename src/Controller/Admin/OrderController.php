<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\BeerRepository;
use App\Repository\ShopRepository;
use App\Repository\UserRepository;
use App\Repository\ShopBeerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    #[Route('/admin/order', name: 'app_admin_order')]
    public function index(ShopRepository $sr): Response
    {
        $shop0 = $sr->findByOrderStatut(0);
        $shop1 = $sr->findByOrderStatut(1);
        $shop2 = $sr->findByOrderStatut(2);
        $shop3 = $sr->findByOrderStatut(3);
        return $this->render('admin/order/index.html.twig', [
            'shops' => $sr->findAll(),
            'shop0' => $shop0,
            'shop1' => $shop1,
            'shop2' => $shop2,
            'shop3' => $shop3
        ]);
    }

    #[Route('/admin/details/order/{id}', name: 'app_admin_details_order', methods: ['GET', 'POST'], requirements: ['id' => '[0-9]+'])]
    public function detailsOrder(ShopRepository $sr, ShopBeerRepository $sbr,  UserRepository $userRepository, Request $request, $id, BeerRepository $br,  User $user, EntityManagerInterface $em): Response
    {
        $com = $request->query->get('com');
        $statut = $request->query->get('statut');
        if(isset($statut)){  
            $shop = $sr->find($com);
            $shop->setOrderStatus($statut);
            $em->flush();}
        $shops = $sr->findByUser($id);
        return $this->render('admin/order/details.html.twig', [
            "beers" => $br->findAll(),
            "shopbeer" => $sbr->findAll(),
            'shops' => $shops,
            'com' => $com,
            "user" => $user,
        ]);
    }
}
