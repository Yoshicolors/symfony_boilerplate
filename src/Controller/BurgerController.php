<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burgers')]
    public function list(): Response
    {
        return $this->render('burgers_list.html.twig');
    }
    #[Route('/burgers/{id}', name: 'burgers_show')]
    public function show(int $id): Response
    {
        
        $burgers = [
            1 => ['name' => 'Le Classique', 'description' => 'Boeuf, salade, tomate, sauce maison.'],
            2 => ['name' => 'Le Fromager', 'description' => 'Boeuf, cheddar fondant, oignons caramélisés.'],
            3 => ['name' => 'Le Veggie', 'description' => 'Galette de légumes, avocat, sauce au yaourt.'],
        ];

        
        if (!isset($burgers[$id])) {
           
            throw $this->createNotFoundException('Burger non trouvé');
        }

        
        $burger = $burgers[$id];

        
        return $this->render('burgers_show.html.twig', [
            'id' => $id,
            'burger' => $burger,
        ]);
    }
}