<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\BeerRepository;
use App\Repository\ShopRepository;
use App\Repository\UserRepository;
use App\Repository\ShopBeerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface as Hasher;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(ShopRepository $sr): Response
    {
        return $this->render('profil/index.html.twig');
    }

    #[Route('/orders/{id}', name: 'app_profil_orders', methods: ['GET', 'POST'])]
    public function orders(ShopRepository $sr, User $user, $id) : Response
    {
        $shops = $sr->findByUser($id);
        return $this->render('profil/orders.html.twig', [
            'shops' => $shops,
        ]);
    }

    #[Route('/edituser/{id}', name: 'app_profil_edituser', methods: ['GET', 'POST'], requirements: ['id' => '[0-9]+'])]
    public function editUser(ShopRepository $sr,  User $user, UserRepository $userRepository, Hasher $hasher, Request $request, EntityManagerInterface $em) : Response
    {
        $formuser = $this->createForm(UserType::class, $user);
        $formuser->handleRequest($request);
        if ($formuser->isSubmitted() && $formuser->isValid()) {
                
            if( $mdp = $formuser->get('plainPassword')->getData()){
                $password = $hasher->hashPassword($user, $mdp);
                $user->setPassword($password);
            }
    
            $em->flush();
            echo "<pre>";
                print_r($user->getPassword());
            echo "</pre>";
            return $this->redirectToRoute('app_profil', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('profil/edit.html.twig', [
            'formuser' => $formuser,
        ]);
    }

    #[Route('/details/{id}', name: 'app_details_order', methods: ['GET', 'POST'], requirements: ['id' => '[0-9]+'])]
    public function details(ShopRepository $sr, ShopBeerRepository $sbr,  UserRepository $userRepository, Request $request, $id, BeerRepository $br) : Response
    {
        $com = $request->query->get('com');
        $shops = $sr->findByUser($id);
        return $this->renderForm('profil/details.html.twig', [
           'id' => $id,
           'com' => $com,
           "beers" => $br->findAll(),
           "shopbeer" => $sbr->findAll(),
           'shops' => $shops
        ]);
    }
}
