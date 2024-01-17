<?php

namespace App\Controller;

use App\Entity\Boat;
use App\Form\BoatType;
use App\Repository\BoatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoatController extends AbstractController
{
    #[Route('/boat/list', name: 'boat.list', methods: ['GET'])]
    public function index(BoatRepository $boatRepository, Request $request): Response
    {
        $boats = $boatRepository->findAll();

        return $this->render('pages/boat/list.html.twig', [
            'boats' => $boats
        ]);
    }


    #[Route('/boat/new', name: 'boat.new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $boat = new Boat();
        $form = $this->createForm(BoatType::class, $boat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($form);
            $manager->persist($boat);
            $manager->flush();

            $this->addFlash('success', 'Le bateau a bien été ajouté');

            return $this->redirectToRoute('boat.list');
        }

        return $this->render('pages/boat/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
