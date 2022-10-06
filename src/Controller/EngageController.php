<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EngageController extends AbstractController
{
    #[Route('/engage', name: 'app_engage')]
    public function index(): Response
    {
        return $this->render('engage/index.html.twig');
    }
}
