<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DemoController extends AbstractController
{
    // #[Route('/demo', name: 'app_demo')]
    // public function index(): Response
    // {
    //     return $this->render('demo/index.html.twig', [
    //         'controller_name' => 'DemoController',
    //     ]);
    // }
    #[Route('/abcd', name: 'app_demo')]
    public function index(): Response
    {
        return $this->render('demo/test.html.twig', [
            'titre' => 'Nouha',
            'age'=>17,
        ]);
    }
}
