<?php

namespace App\Controller;

use App\Entity\Boat;
use App\Form\BoatType;
use App\Entity\BoatImage;
use App\Form\BoatImageType;
use App\Repository\BoatRepository;
use App\Repository\BoatImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BoatController extends AbstractController
{

    public function filterBoatsByBrand(BoatRepository $boatRepository, ?string $brand): array
    {
        if ($brand === null) {
            return $boatRepository->findAll();
        }
    
        return $boatRepository->findByBrand($brand);
    }
    

    /**
     * this controller display the list of all Boat
     * @param BoatRepository $boatRepository
     * @param Request $request
     * @return Response
     */
    #[Route('/boat/list', name: 'boat.list', methods: ['GET'])]
    public function index(BoatRepository $boatRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $form = $this->createForm(BoatType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            dd('Form submitted');
            $brand = $form->get('brand')->getData();
            $boats = $this->filterBoatsByBrand($boatRepository, $brand);
        } else {
            $boats = $paginator->paginate(
                $boatRepository->findAll(),
                $request->query->getInt('page', 1),
                5
            );
        }
    
        return $this->render('pages/boat/list.html.twig', [
            'boats' => $boats,
            'form' => $form->createView(),
        ]);
    }
    
    

    #[Route('/boat/show/{id}', name: 'boat.show', methods: ['GET'])]
    public function show(Boat $boat, BoatImage $boatImages, BoatImageRepository $boatImageRepository): Response
    {
        $boatImages = $boatImageRepository->findBy(['boat' => $boat]);
        return $this->render('pages/boat/show.html.twig', [
            'boat' => $boat,
            'boatImages' => $boatImages
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
        $boat->setYear(new \DateTimeImmutable(2000-01-01));
        $form = $this->createForm(BoatType::class, $boat);
        $boat ->setBrand('default');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($form);
            $manager->persist($boat);
            $manager->flush();

            $this->addFlash('success', 'Le bateau a bien été ajouté');

            return $this->redirectToRoute('boat.list');
        }

        return $this->render('pages/boat/new.html.twig', [
            'form' => $form->createView(),
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
    public function edit(Boat $boat, Request $request, EntityManagerInterface $manager) : Response
    {
        $form = $this->createForm(BoatType::class, $boat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boat = $form->getData();
            $manager->persist($boat);
            $manager->flush();
            $this->addFlash('success', 'Le bateau a bien été modifié');
            return $this->redirectToRoute('boat.list');
        }

        return $this->render('pages/boat/edit.html.twig', [
            'form' => $form->createView(),
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
