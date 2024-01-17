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

    /**
     * this controller display the list of all Boat
     *
     * @param BoatRepository $boatRepository
     * @param Request $request
     * @return Response
     */
    #[Route('/boat/list', name: 'boat.list', methods: ['GET'])]
    public function index(BoatRepository $boatRepository, Request $request): Response
    {
        $boats = $boatRepository->findAll();

        return $this->render('pages/boat/list.html.twig', [
            'boats' => $boats
        ]);
    }

    #[Route('/boat/show/{id}', name: 'boat.show', methods: ['GET'])]
    public function show(Boat $boat): Response
    {
        return $this->render('pages/boat/show.html.twig', [
            'boat' => $boat
        ]);
    }


    /**
     * this controller allow us to add Boat in database
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
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

    /**
     * this controller allow us to edit Boat in database
     *
     * @param Request $request
     * @param Boat $boat
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/boat/edit/{id}', name: 'boat.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Boat $boat, EntityManagerInterface $manager) : Response
    {
        $form = $this->createForm(BoatType::class, $boat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($form);
            $manager->persist($boat);
            $manager->flush();

            $this->addFlash('success', 'Le bateau a bien été modifié');

            return $this->redirectToRoute('boat.list');
        }

        return $this->render('pages/boat/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }



    /**
     * this controller allow us to delete Boat in database
     *
     * @param Boat $boat
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/boat/delete/{id}', name: 'boat.delete', methods: ['GET', 'POST'])]
    public function delete(Boat $boat, EntityManagerInterface $manager) : Response
    {
        $manager->remove($boat);
        $manager->flush();

        $this->addFlash('success', 'Le bateau a bien été supprimé');

        return $this->redirectToRoute('boat.list');
    }
}
