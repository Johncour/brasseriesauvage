<?php

namespace App\Controller;

use App\Entity\Shop;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\ShopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, ShopRepository $shopRepository): Response
    {
        $s = new Shop();
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            if($form->get('email')->getData() == 'mnopq@or.com'){
                $user->setRoles(['ROLE_ADMIN']);} 
            else {
                $user->setRoles(['ROLE_USER']);}

            // $s->setOrderStatus(0);
            // $s->setOrderDate($user->getBirthdayDate());
            // $s->setShippingDate($user->getBirthdayDate());
            // $s->setPriceOrder(0);

            // $entityManager->persist($s);
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_shop');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
