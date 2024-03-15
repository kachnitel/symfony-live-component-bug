<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AsdfController extends AbstractController
{
    #[Route('/', name: 'app_asdf')]
    public function index(): Response
    {
        return $this->render('asdf/index.html.twig', [
            'controller_name' => 'AsdfController',
        ]);
    }
}
