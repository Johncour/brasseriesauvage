<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrasserieController extends AbstractController
{
    #[Route('/brasserie', name: 'app_brasserie')]
    public function index(): Response
    {
        return $this->render('brasserie/index.html.twig');
    }
}
