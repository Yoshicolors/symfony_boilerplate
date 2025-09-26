<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CommentaireRepository;

final class CommentaireController extends AbstractController
{
    #[Route('/commentaires', name: 'commentaires')]
    public function index(CommentaireRepository $commentaireRepository): Response
    {
        // Vous pouvez injecter EntityManagerInterface à la place de CommentaireRepository qui n'existe pas encore
        $commentaires = $commentaireRepository->findAll();
        return $this->render('commentaires_list.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }
}
