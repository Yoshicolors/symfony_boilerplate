<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PainRepository;

final class PainController extends AbstractController
{
    #[Route('/pains', name: 'pains')]
    public function index(PainRepository $painRepository): Response
    {
        // Vous pouvez injecter EntityManagerInterface à la place de PainRepository qui n'existe pas encore
        $pains = $painRepository->findAll();
        return $this->render('pains_list.html.twig', [
            'pains' => $pains,
        ]);
    }
}
