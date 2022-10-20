<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function index(EntityManagerInterface $em, Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact;
        $contact->setReadding(false);
        $contact->setAnswer(false);
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);
        if( $formContact->isSubmitted() && $formContact->isValid() ){
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', 'Message envoyé ! Nous répondrons rapidement ! Merci');
            return $this->redirectToRoute("app_contact");
        }

        return $this->render('contact/index.html.twig', [
            'formContact' => $formContact->createView(),
        ]);
    }
}
