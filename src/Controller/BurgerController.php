<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BurgerRepository;

class BurgerController extends AbstractController
{
    #[Route('/burgers/{id}', name: 'burgers_show')]
    public function show(int $id, BurgerRepository $burgerRepository): Response
    {
        
        $burger = $burgerRepository->find($id);

        if (!isset($burger)) {
           
            throw $this->createNotFoundException('Burger non trouvé');
        }

        
        return $this->render('burgers_show.html.twig', [
            'burger' => $burger,
        ]);
    }
    #[Route('/burgers', name: 'burgers')]
    public function index(BurgerRepository $burgerRepository): Response
    {
        // Vous pouvez injecter EntityManagerInterface à la place de BurgerRepository qui n'existe pas encore
        $burgers = $burgerRepository->findAll();
        return $this->render('burgers_list.html.twig', [
            'burgers' => $burgers,
        ]);
    }
}