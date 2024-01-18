<?php

namespace App\Controller;

use App\Repository\BoatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'default')]
    public function index(BoatRepository $boatRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $boats = $paginator->paginate(
            $boatRepository->findByBrand('default'),
            $request->query->getInt('page', 1),
            5
        );
        // $boats = $boatRepository->findByBrand('default');

        return $this->render('pages/default/index.html.twig', [
            'boats' => $boats
        ]);
    }
}
