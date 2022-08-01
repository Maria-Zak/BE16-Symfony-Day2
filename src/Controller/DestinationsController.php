<?php

namespace App\Controller;

use App\Entity\Destinations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class DestinationsController extends AbstractController
{
    #[Route('/destinations', name: 'app_destinations')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $destinations = $doctrine->getRepository(Destinations::class)->findAll();
        // dd($destinations);
        return $this->render("destinations/index.html.twig", [
            "destinations" =>$destinations
        ]);
    }
    #[Route('/destinations/details/{id}', name: 'app_destinations_details')]
    public function details(ManagerRegistry $doctrine, $id): Response
    {
        $destination = $doctrine->getRepository(Destinations::class)->find($id);
        // dd($destinations);
        return $this->render("destinations/details.html.twig", [
            "destination" =>$destination
        ]);
    }

    #[Route('/destinations/create', name: 'app_destinations_create')]
    public function create(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $destination = new Destinations();
        $destination->setName("CodeFactory");
        $destination->setLocation("Vienna");
        $destination->setPrice(5000);
        $em->persist($destination);
        $em->flush(); #(insert into products () values ())

        return new Response("Product has been created with name : ". $destination->getName() . " and price = ".$destination->getPrice());
    }
}
