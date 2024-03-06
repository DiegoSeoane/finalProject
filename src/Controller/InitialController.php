<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Speciality;
use App\Entity\User;
use App\Repository\SpecialityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InitialController extends AbstractController
{
    // Uncomment in first place
    // #[Route('/', name: 'app_initial')]
    // public function iniciarArraySpeciality(EntityManagerInterface $entityManager)
    // {        
        
    //     $array = ['Neurology', 'Cardiology','Ophtalmology', 'Otorhinolaryngology', 'Psychology', 'Psychiatry'];
    //     foreach ($array as $name) {            
    //       $speciality = new Speciality;          
    //       $speciality->setSpecialityName($name);
    //       $entityManager->persist($speciality);
    //     }           

    //     $entityManager->flush(); 
    //     return new Response('Datos engadidos');
    // }
// Uncomment this after flush specialities
    // #[Route('/', name: 'app_initial')]
    // public function iniciarArraySpeciality(SpecialityRepository $specialityRepository, EntityManagerInterface $entityManager)
    // {
        
    //     $arrayPatient = [['name'=>'Adolfo', 'surname'=>'Gilbert', 'address'=>'Fake Street 321', 'speciality'=>1, 'diagnosis' => 'Headache', 'ssn' => '123-45-6789'],
    //     ['name'=>'Julius', 'surname'=>'Tomorrow', 'address'=>'The Pine 123', 'speciality'=>1, 'diagnosis' => 'Fever', 'ssn' => '987-65-4321'],
    //     ['name'=>'Juan', 'surname'=>'Perez', 'address'=>'Oak Avenue 456', 'speciality'=>2, 'diagnosis' => 'Heart Disease', 'ssn' => '456-78-9012'],    
    //     ['name'=>'Luisa', 'surname'=>'Gomez', 'address'=>'Elm Street 789', 'speciality'=>5, 'diagnosis' => 'Anxiety', 'ssn' => '789-12-3456'],
    //     ['name'=>'Pedro', 'surname'=>'Sanchez', 'address'=>'Cedar Road 1011', 'speciality'=>2, 'diagnosis' => 'Diabetes', 'ssn' => '654-32-1098'],
    //     ['name'=>'Ana', 'surname'=>'Rodriguez', 'address'=>'Maple Lane 1213', 'speciality'=>4, 'diagnosis' => 'Depression', 'ssn' => '321-98-7654'],
    //     ['name'=>'Carlos', 'surname'=>'Lopez', 'address'=>'Pine Street 1415', 'speciality'=>4, 'diagnosis' => 'Schizophrenia', 'ssn' => '456-78-9876'],
    //     ['name'=>'Laura', 'surname'=>'Hernandez', 'address'=>'Birch Avenue 1617', 'speciality'=>6, 'diagnosis' => 'Bipolar Disorder', 'ssn' => '789-01-2345'],
    //     ['name'=>'Diego', 'surname'=>'Diaz', 'address'=>'Willow Road 1819', 'speciality'=>1, 'diagnosis' => 'Asthma', 'ssn' => '123-45-6780'],
    //     ['name'=>'Sofia', 'surname'=>'Torres', 'address'=>'Cypress Lane 2021', 'speciality'=>3, 'diagnosis' => 'Hypertension', 'ssn' => '678-90-1234'],
    //     ['name'=>'Javier', 'surname'=>'Ramirez', 'address'=>'Fir Street 2223', 'speciality'=>2, 'diagnosis' => 'Arthritis', 'ssn' => '901-23-4567'],
    //     ['name'=>'Elena', 'surname'=>'Vargas', 'address'=>'Juniper Drive 2425', 'speciality'=>5, 'diagnosis' => 'Osteoporosis', 'ssn' => '345-67-8901'],
    //     ['name'=>'Gabriel', 'surname'=>'Moreno', 'address'=>'Sycamore Lane 2627', 'speciality'=>3, 'diagnosis' => 'Bronchitis', 'ssn' => '234-56-7890'],
    //     ['name'=>'Marta', 'surname'=>'Gutierrez', 'address'=>'Ash Road 2829', 'speciality'=>2, 'diagnosis' => 'Pneumonia', 'ssn' => '567-89-0123'],
    //     ['name'=>'Roberto', 'surname'=>'Jimenez', 'address'=>'Hickory Lane 3031', 'speciality'=>5, 'diagnosis' => 'Obesity', 'ssn' => '678-90-1234'],
    //     ['name'=>'Alejandra', 'surname'=>'Ruiz', 'address'=>'Spruce Street 3233', 'speciality'=>4, 'diagnosis' => 'Epilepsy', 'ssn' => '789-01-2345'],
    //     ['name'=>'Raul', 'surname'=>'Alvarez', 'address'=>'Chestnut Avenue 3435', 'speciality'=>6, 'diagnosis' => 'Alzheimer', 'ssn' => '890-12-3456'],
    //     ['name'=>'Patricia', 'surname'=>'Castillo', 'address'=>'Poplar Drive 3637', 'speciality'=>1, 'diagnosis' => 'Parkinson', 'ssn' => '901-23-4567'],
    //     ['name'=>'Fernando', 'surname'=>'Gonzalez', 'address'=>'Beech Road 3839', 'speciality'=>5, 'diagnosis' => 'Stroke', 'ssn' => '012-34-5678'],
    //     ['name'=>'Carmen', 'surname'=>'Flores', 'address'=>'Linden Lane 4041', 'speciality'=>2, 'diagnosis' => 'Cancer', 'ssn' => '123-45-6789'],
    //     ['name'=>'Rosa', 'surname'=>'Ortega', 'address'=>'Walnut Street 4243', 'speciality'=>6, 'diagnosis' => 'Fibromyalgia', 'ssn' => '987-65-4321'],
    //     ['name'=>'Antonio', 'surname'=>'Santos', 'address'=>'Dogwood Drive 4445', 'speciality'=>3, 'diagnosis' => 'Liver Disease', 'ssn' => '456-78-9012'],
    //     ['name'=>'Isabel', 'surname'=>'Reyes', 'address'=>'Mulberry Lane 4647', 'speciality'=>4, 'diagnosis' => 'Kidney Failure', 'ssn' => '789-01-2345'],
    //     ['name'=>'Pablo', 'surname'=>'Nunez', 'address'=>'Holly Avenue 4849', 'speciality'=>1, 'diagnosis' => 'Hepatitis', 'ssn' => '901-23-4567'],
    //     ['name'=>'Silvia', 'surname'=>'Cruz', 'address'=>'Cottonwood Lane 5051', 'speciality'=>3, 'diagnosis' => 'Diarrhea', 'ssn' => '012-34-5678'],
    //     ['name'=>'Daniel', 'surname'=>'Morales', 'address'=>'Redwood Road 5253', 'speciality'=>2, 'diagnosis' => 'Ulcer', 'ssn' => '123-45-6789'],
    //     ['name'=>'Lucia', 'surname'=>'Ibanez', 'address'=>'Cedar Lane 5455', 'speciality'=>1, 'diagnosis' => 'Eczema', 'ssn' => '234-56-7890'],
    //     ['name'=>'Andres', 'surname'=>'Fernandez', 'address'=>'Cherry Street 5657', 'speciality'=>3, 'diagnosis' => 'Allergy', 'ssn' => '345-67-8901'],
    //     ['name'=>'Eva', 'surname'=>'Perez', 'address'=>'Elm Avenue 5859', 'speciality'=>4, 'diagnosis' => 'Insomnia', 'ssn'=> '442-23-4613']];

    //     $arraySpeciality = $specialityRepository->findAll();

    //     foreach ($arrayPatient as $valuePa) {        
    //         $specialityId = $valuePa['speciality'];

    //         $speciality = $entityManager->getRepository(Speciality::class)->find($specialityId);
    //         if (!$speciality) {
    //             // This will throw a exception if speciality does not exist
    //             throw $this->createNotFoundException('Speciality not found for id ' . $specialityId);
    //         }
            
    //         // We create here the new object Patient because of the behavior of symphony
    //         // in the databases, we need to relate the ID which is an entity
    //         $patient = new Patient();
    //         $patient->setName($valuePa['name']);
    //         $patient->setSurname($valuePa['surname']);
    //         $patient->setAddress($valuePa['address']);
    //         $patient->setDiagnosis($valuePa['diagnosis']);
    //         $patient->setSsn($valuePa['ssn']);
            
    //         $patient->setSpeciality($speciality);
            
    //         $speciality->addIdSpeciality($patient);
            
    //         $entityManager->persist($patient);
    //     }
    //     $entityManager->flush();                     
    //     return new Response('Datos engadidos');
    // }
}
