<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ImageRepository;

final class ImageController extends AbstractController
{
    #[Route('/images', name: 'images')]
    public function index(ImageRepository $imageRepository): Response
    {
        // Vous pouvez injecter EntityManagerInterface à la place de ImageRepository qui n'existe pas encore
        $images = $imageeRepository->findAll();
        return $this->render('images_list.html.twig', [
            'images' => $images,
        ]);
    }
}
