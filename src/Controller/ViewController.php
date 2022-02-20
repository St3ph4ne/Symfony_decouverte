<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\PersonneRepository;
use App\Repository\PartitionRepository;
use App\Entity\Personne;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\Persistence\ManagerRegistry;

class ViewController extends AbstractController
{

    /**
     * Pour afficher toutes les données de la table personne :
     */
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

    /**
     * Pour afficher toutes les données de la table user :
     */
    #[Route('/users', name: 'users')]
    public function getUsers(UserRepository $repo): Response
    {
        $users = $repo->getAll();
        $CONTEXT = ['users'=>$users];

        return $this->render('view/users.html.twig', $CONTEXT);
    }


    /**
     * Pour afficher toutes les données de la table personne :
     */
    #[Route('/personnes', name: 'personnes')]
    public function getPersonnes(PersonneRepository $repo): Response
    {
        $personnes = $repo->getAll();
        $CONTEXT = ['personnes'=>$personnes];

        return $this->render('view/personnes.html.twig', $CONTEXT);
    }

    
    /**
     * Pour modifier une entité personne :
     */
    #[Route('/form/personne/{id}', name: 'personne_update')]
    public function updatePersonne(ManagerRegistry $doctrine, int $id, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $personne = $entityManager->getRepository(Personne::class)->find($id);
        $personne = new Personne();

        $form = $this->createFormBuilder($personne)
            ->add('genre', TextType::class)
            ->add('nom', TextType::class)
            ->add('naissance', DateType::class)
            ->add('nationalite', TextType::class)
            ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $entityManager->flush();
                return $this->redirectToRoute('personnes');
            }

        $CONTEXT = ['updatePersonne' => $form->createView()];
        return $this->render('view/update_personne.html.twig', $CONTEXT);
    }

    /**
     * Pour supprimer une entité Personne :
     */
    #[Route('/personnes', name: 'personne_delete')]
    public function deletePersonne(ManagerRegistry $doctrine, int $id, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $personne = $entityManager->getRepository(Personne::class)->find($id);
        $entityManager->remove($personne);
        $entityManager->flush();
        return $this->redirectToRoute('personnes');
        $CONTEXT = ['deletePersonne' => $form->createView()];
        return $this->render('personnes', $CONTEXT);

    }


    /**
     * Pour afficher toutes les données de la table partition :
     */
    #[Route('/partitions', name: 'partitions')]
    public function getPartitions(PartitionRepository $repo): Response
    {
        $partitions = $repo->getAll();
        $CONTEXT = ['partitions'=>$partitions];

        return $this->render('view/partitions.html.twig', $CONTEXT);
    }

}
