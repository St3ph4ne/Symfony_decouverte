<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    #[Route('/view', name: 'view')]
    public function index(): Response
    {
        $context = [
            'name' => 'stephane',
            'age' => 105,
            'ville' => 'Montpellier'
        ];

        return $this->render('view/index.html.twig', $context);
    }
}
