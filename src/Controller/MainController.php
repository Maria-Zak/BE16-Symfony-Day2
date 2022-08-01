<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function main(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $obj = new stdClass();
        $obj-> name = "Maria";
        $obj-> age = 25;
        return $this->render('main/home.html.twig',[
            "object"=>$obj
        ]);
    }
}
