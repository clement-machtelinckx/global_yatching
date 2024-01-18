<?php

namespace App\Controller;

use App\Repository\BoatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FaceController extends AbstractController
{
    #[Route('/face', name: 'face')]
    public function index(BoatRepository $boatRepository, Request $request): Response
    {
        $boats = $boatRepository->findByBrand('face');

        return $this->render('pages/face/index.html.twig', [
            'boats' => $boats
        ]);
    }
}
