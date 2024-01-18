<?php

namespace App\Controller;

use App\Repository\BoatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PirelliController extends AbstractController
{
    #[Route('/pirelli', name: 'pirelli')]
    public function index(BoatRepository $boatRepository, Request $request): Response
    {
        $boats = $boatRepository->findAll();

        return $this->render('pages/pirelli/index.html.twig', [
            'boats' => $boats
        ]);
    }
}
