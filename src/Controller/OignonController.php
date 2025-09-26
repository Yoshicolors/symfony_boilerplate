<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\OignonRepository;

final class OignonController extends AbstractController
{
    #[Route('/oignons', name: 'oignons')]
    public function index(OignonRepository $oignonRepository): Response
    {
        // Vous pouvez injecter EntityManagerInterface à la place de OignonRepository qui n'existe pas encore
        $oignons = $oignonRepository->findAll();
        return $this->render('oignons_list.html.twig', [
            'oignons' => $oignons,
        ]);
    }
}
