<?php

namespace App\Controller;

use App\Entity\Boat;
use App\Form\BoatImageType;
use App\Entity\BoatImage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoatImageController extends AbstractController
{
    #[Route('/boat/image', name: 'app_boat_image')]
    public function index(): Response
    {
        return $this->render('boat_image/index.html.twig', [
            'controller_name' => 'BoatImageController',
        ]);
    }

    #[Route('/boat/upload/{id}', name: 'boat.upload', methods: ['GET', 'POST'])]
    public function uploadImages(int $id, Boat $boat, Request $request, EntityManagerInterface $manager): Response
    {
        $boatImage = new BoatImage();
        $boatForm = $this->createForm(BoatImageType::class, $boatImage);
        $boatForm->handleRequest($request);
    
        if ($boatForm->isSubmitted() && $boatForm->isValid()) {
            $boatImage = $boatForm->getData();
            $boatImage->setBoat($boat); // Associer l'image au bateau
            $manager->persist($boatImage);
            $manager->flush();
    
            $this->addFlash('success', 'Les images ont bien été rajoutées');
    
            return $this->redirectToRoute('boat.list');
        }
    
        return $this->render('pages/boat_image/index.html.twig', [
            'form' => $boatForm->createView(),
        ]);
    }
    
}
