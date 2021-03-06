<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

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



    #[Route('/users', name: 'users')]
    public function getUsers(UserRepository $repo): Response
    {
        $users = $repo->getAll();
        $CONTEXT = ['users'=>$users];

        return $this->render('view/users.html.twig', $CONTEXT);
    }

}
