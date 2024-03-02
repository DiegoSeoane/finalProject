<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\SpecialityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PatientController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {        
        return $this->render('patient/index.html.twig', [            
            'name'=>'Central Hospital Baroja'
        ]);
    }
    #[Route('/patientlist')]
    public function patientList(PatientRepository $patientRepository, SpecialityRepository $specialityRepository):Response{
        $patients = $patientRepository->findAll();
        $speciality = $specialityRepository->findAll();

        return $this->render('patient/patientlist.html.twig',[
            'list' => $patients,
            'specialities' =>$speciality,
        ]);
    }
}
