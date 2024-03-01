<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Speciality;
use App\Repository\SpecialityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InitialController extends AbstractController
{
    // Uncomment in first place
    // #[Route('/', name: 'app_initial')]
    // public function iniciarArraySpeciality()
    // {        
        // 
        // $array = ['Cardiology', 'Ophtalmology', 'Otorhinolaryngology', 'Psychology', 'Psychiatry'];
        // foreach ($array as $name) {            
        //   $speciality = new Speciality;          
        //   $speciality->setSpecialityName($name);
        //   $entityManager->persist($speciality);
        // }   
        // $arrayPatient = [['name'=>'Adolfo', 'surname'=>'Gilbert', 'address'=>'Fake Street 321', 'speciality'=>1]];
        // foreach ($arrayPatient as $key => $value) {
        //     $patient = new Patient;
        //     $patient->setName($value['name']);
        //     $patient->setSurname($value['surname']);
        //     $patient->setAddress($value['address']);
        //     $patient->setSpeciality($value['speciality']); tipo Speciality
        // }

        // $entityManager->flush(); 
    // }
// Uncomment this after flush specialities
    #[Route('/', name: 'app_initial')]
    public function iniciarArraySpeciality(SpecialityRepository $specialityRepository)
    {
        
        $arrayPatient = [['name'=>'Adolfo', 'surname'=>'Gilbert', 'address'=>'Fake Street 321', 'speciality'=>1]];
        $arraySpeciality = $specialityRepository->findAll();           
        
        foreach ($arrayPatient as $key => $valuePa) {
            $speciality = new Speciality;
            $patient = new Patient;
            $patient->setName($valuePa['name']);
            $patient->setSurname($valuePa['surname']);
            $patient->setAddress($valuePa['address']);
            foreach ($arraySpeciality as $valueSpe) {
                $valueSpe->getSpecialityName();
                $patient->setSpeciality($speciality);
            }
            
        }

        // $entityManager->flush(); 
    }

}
