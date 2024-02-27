<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SpecialityController extends AbstractController
{
    #[Route('/speciality', name: 'app_speciality')]
    public function index(): Response
    {
        return $this->render('speciality/index.html.twig', [
            'controller_name' => 'SpecialityController',
        ]);
    }
}
