<?php

namespace App\Controller;

use App\Entity\Patient;
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
            'name' => 'Central Hospital Baroja'
        ]);
    }
    #[Route('/patientlist', name: 'patientlist')]
    public function patientList(PatientRepository $patientRepository, SpecialityRepository $specialityRepository): Response
    {
        $patients = $patientRepository->findAll();
        $speciality = $specialityRepository->findAll();

        return $this->render('patient/patientlist.html.twig', [
            'list' => $patients,
            'specialities' => $speciality,
        ]);
    }
    #[Route('/patient/modify/{slug}', name: 'modify')]
    public function modifyPatient(Request $request, PatientRepository $patientRepository, $slug, EntityManagerInterface $entityManager, SpecialityRepository $specialityRepository): Response
    {

        $patient = $patientRepository->findOneBy(['id' => $slug]);
        if (!$patient) { //throw error if patient do not exist
            throw $this->createNotFoundException('Patient not found');
        }

        if ($request->isMethod('POST')) {

            $patient->setName($request->request->get('name'));
            $patient->setSurname($request->request->get('surname'));
            $patient->setAddress($request->request->get('address'));
            $patient->setDiagnosis($request->request->get('diagnosis'));
            $patient->setSsn($request->request->get('ssn'));
            $specialities = $specialityRepository->findAll();
            $specialityFound = false;
            foreach ($specialities as $speciality) {
                if ($speciality->getSpecialityName() == $request->request->get('speciality')) {
                    $patient->setSpeciality($speciality);
                    $specialityFound = true;
                    break;
                }
            }

            if (!$specialityFound) {
                throw $this->createNotFoundException('Speciality not found');
            }
            $entityManager->persist($patient);
            $entityManager->flush();


            return $this->redirectToRoute('patientlist');
        }


        return $this->render('patient/modifypatient.html.twig', [
            'slug' => $slug,
            'patient' => $patient,
        ]);
    }
    #[Route('/patientlist/addpatient', name: 'addpatient')]
    public function addpatient(EntityManagerInterface $entityManager, SpecialityRepository $specialityRepository, Request $request): Response
    {
        $patient = new Patient();
        if (!$patient) { //throw error if patient do not exist
            throw $this->createNotFoundException('Patient not found');
        }

        if ($request->isMethod('POST')) {

            $patient->setName($request->request->get('name'));
            $patient->setSurname($request->request->get('surname'));
            $patient->setAddress($request->request->get('address'));
            $patient->setDiagnosis($request->request->get('diagnosis'));
            $patient->setSsn($request->request->get('ssn'));
            $specialities = $specialityRepository->findAll();
            $specialityFound = false;
            foreach ($specialities as $speciality) {
                if ($speciality->getSpecialityName() == $request->request->get('speciality')) {
                    $patient->setSpeciality($speciality);
                    $specialityFound = true;
                    break;
                }
            }

            if (!$specialityFound) {
                throw $this->createNotFoundException('Speciality not found');
            }
            $entityManager->persist($patient);
            $entityManager->flush();
            
            return $this->redirectToRoute('patientlist');
        }
        return $this->render('patient/addpatient.html.twig', [   
            'patient'=>$patient
        ]);
    }
}
