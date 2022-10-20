<?php

namespace App\Controller\Admin;

use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/admin/contact', name: 'app_admin_contact')]
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('admin/contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    #[Route('/admin/contact/modif/{id}/{check}', name: 'app_admin_contact_modif_check', methods: ['GET', 'POST'])]
    public function contactCheck(ContactRepository $contactRepository, Request $request, EntityManagerInterface $em, $id, $check): Response
    {
        $contact = $contactRepository->find($id);
        if($check == 0){
            $contact->setReadding(0);
        } else if($check == 1){
            $contact->setReadding(1);
        } else if($check == 2){
            $contact->setAnswer(0);
        } else if($check == 3){
            $contact->setAnswer(1);
        }
        echo "<pre>";
            print_r($contact);
        echo "</pre>";
        $em->persist($contact);
        $em->flush();
        return $this->redirectToRoute('app_admin_contact', [], Response::HTTP_SEE_OTHER);   
    }

    #[Route('/admin/contact/delete/{id}', name: 'app_admin_contact_delete', methods: ['GET', 'POST'])]
    public function contactDelete(ContactRepository $contactRepository, EntityManagerInterface $em, $id): Response
    {
        $contact = $contactRepository->find($id);
        $em->remove($contact);
        $em->flush();
        $this->addFlash('success', 'Message supprimé');
        return $this->redirectToRoute('app_admin_contact', [], Response::HTTP_SEE_OTHER);   
    }

}
