<?php

namespace App\Controller;

use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InitialController extends AbstractController
{
    #[Route('/', name: 'app_initial')]
    public function iniciarArray()
    {
        // Descomentar esto a primeira vez
        // 
            // $arrayPatient = [['name'=>'Adolfo', 'surname'=>'Gilbert', 'address'=>'Fake Street 321', 'speciality'=>1]];
            // foreach ($arrayPatient as $key => $value) {
            //     $patient = new Patient;
            //     $patient->setName($value['name']);
            //     $patient->setSurname($value['surname']);
            //     $patient->setAddress($value['address']);
            //     $patient->setSpeciality($value['speciality']); tipo Speciality
            // }
        // $array = ['Cardiology', 'Ophtalmology', 'Otorhinolaryngology', 'Psychology', 'Psychiatry'];
        // foreach ($array as $name) {            
        //   $speciality = new Speciality;          
        //   $speciality->setSpecialityName($name);
        //   $entityManager->persist($speciality);
        // }                              
        // $entityManager->flush(); 
    }
}
