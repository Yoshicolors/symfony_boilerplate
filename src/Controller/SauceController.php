<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SauceRepository;

final class SauceController extends AbstractController
{
    #[Route('/sauces', name: 'sauces')]
    public function index(SauceRepository $sauceRepository): Response
    {
        // Vous pouvez injecter EntityManagerInterface à la place de SauceRepository qui n'existe pas encore
        $sauces = $sauceRepository->findAll();
        return $this->render('sauces_list.html.twig', [
            'sauces' => $sauces,
        ]);
    }
}
