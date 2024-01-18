<?php

namespace App\Controller;

use App\Repository\BoatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;


class PirelliController extends AbstractController
{
    #[Route('/pirelli', name: 'pirelli')]
    public function index(BoatRepository $boatRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $boats = $paginator->paginate(
            $boatRepository->findByBrand('pirelli'),
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('pages/pirelli/index.html.twig', [
            'boats' => $boats
        ]);
    }
}
