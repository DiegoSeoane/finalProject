<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Repository\SpecialityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SpecialityController extends AbstractController
{
    #[Route('/homepage', name: 'app_speciality')]
    public function index(SpecialityRepository $specialityRepository, EntityManagerInterface $entityManager): Response
    {
        return $this->render('speciality/homepage.html.twig', [
            'specialities' =>$specialityRepository->findAll(),            
        ]);
    }
}
