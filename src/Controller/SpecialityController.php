<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Repository\PatientRepository;
use App\Repository\SpecialityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SpecialityController extends AbstractController
{
    #[Route('/specialities', name: 'app_speciality')]
    public function index(SpecialityRepository $specialityRepository): Response
    {
        return $this->render('speciality/specialities.html.twig', [
            'specialities' =>$specialityRepository->findAll(),            
        ]);
    }
    #[Route('/specialities/{slug}')]
    public function specificSpeciality(PatientRepository $patientRepository, $slug){
        $patientList = $patientRepository->findAll();
        return $this->render('speciality/specific.html.twig',[
            'SpecName'=> $slug,
            'patientlist'=> $patientList
        ]);
    }
    #[Route('/patient/{slug}')]
    public function specificPatient(PatientRepository $patientRepository, $slug){
        $patientList = $patientRepository->findAll();
        return $this->render('patient/patientinfo.html.twig',[
            'id'=> $slug,
            'patientlist'=> $patientList
        ]);
    }
}
