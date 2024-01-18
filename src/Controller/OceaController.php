<?php

namespace App\Controller;

use App\Repository\BoatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OceaController extends AbstractController
{
    #[Route('/ocea', name: 'ocea')]
    public function index(BoatRepository $boatRepository, Request $request): Response
    {
        $boats = $boatRepository->findByBrand('ocea');

        return $this->render('pages/ocea/index.html.twig', [
            'boats' => $boats
        ]);
    }
}
