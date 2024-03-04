<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\SpecialityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/patientlist', name:'patientlist')]
    public function patientList(PatientRepository $patientRepository, SpecialityRepository $specialityRepository):Response{
        $patients = $patientRepository->findAll();
        $speciality = $specialityRepository->findAll();

        return $this->render('patient/patientlist.html.twig',[
            'list' => $patients,
            'specialities' =>$speciality,
        ]);
    }
    #[Route('/patient/modify/{slug}', name:'modify')]
    public function modifyPatient(Request $request, PatientRepository $patientRepository, $slug, EntityManagerInterface $entityManager): Response
    {
        
        $patient = $patientRepository->findOneBy(['id' => $slug]);

        
        if ($request->isMethod('POST')) {
            
            $patient->setName($request->request->get('name'));
            $patient->setAddress($request->request->get('address'));


            
            $entityManager->persist($patient);
            $entityManager->flush();

            
            return $this->redirectToRoute('patientlist');
        }

        
        return $this->render('patient/modifypatient.html.twig', [
            'slug' => $slug,
            'patient' => $patient,
        ]);
    }
}
