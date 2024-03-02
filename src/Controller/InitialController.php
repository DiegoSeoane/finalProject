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
        
    //     $array = ['Neurology', 'Ophtalmology', 'Otorhinolaryngology', 'Psychology', 'Psychiatry'];
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
        
    //     $arrayPatient = [['name'=>'Adolfo', 'surname'=>'Gilbert', 'address'=>'Fake Street 321', 'speciality'=>1],
    //     ['name'=>'Maria', 'surname'=>'Martinez', 'address'=>'Main Street 123', 'speciality'=>2],
    //     ['name'=>'Juan', 'surname'=>'Perez', 'address'=>'Oak Avenue 456', 'speciality'=>1],
    //     ['name'=>'Luisa', 'surname'=>'Gomez', 'address'=>'Elm Street 789', 'speciality'=>5],
    //     ['name'=>'Pedro', 'surname'=>'Sanchez', 'address'=>'Cedar Road 1011', 'speciality'=>2],
    //     ['name'=>'Ana', 'surname'=>'Rodriguez', 'address'=>'Maple Lane 1213', 'speciality'=>1],
    //     ['name'=>'Carlos', 'surname'=>'Lopez', 'address'=>'Pine Street 1415', 'speciality'=>4],
    //     ['name'=>'Laura', 'surname'=>'Hernandez', 'address'=>'Birch Avenue 1617', 'speciality'=>2],
    //     ['name'=>'Diego', 'surname'=>'Diaz', 'address'=>'Willow Road 1819', 'speciality'=>1],
    //     ['name'=>'Sofia', 'surname'=>'Torres', 'address'=>'Cypress Lane 2021', 'speciality'=>3],
    //     ['name'=>'Javier', 'surname'=>'Ramirez', 'address'=>'Fir Street 2223', 'speciality'=>2],
    //     ['name'=>'Elena', 'surname'=>'Vargas', 'address'=>'Juniper Drive 2425', 'speciality'=>5],
    //     ['name'=>'Gabriel', 'surname'=>'Moreno', 'address'=>'Sycamore Lane 2627', 'speciality'=>3],
    //     ['name'=>'Marta', 'surname'=>'Gutierrez', 'address'=>'Ash Road 2829', 'speciality'=>2],
    //     ['name'=>'Roberto', 'surname'=>'Jimenez', 'address'=>'Hickory Lane 3031', 'speciality'=>5],
    //     ['name'=>'Alejandra', 'surname'=>'Ruiz', 'address'=>'Spruce Street 3233', 'speciality'=>4],
    //     ['name'=>'Raul', 'surname'=>'Alvarez', 'address'=>'Chestnut Avenue 3435', 'speciality'=>2],
    //     ['name'=>'Patricia', 'surname'=>'Castillo', 'address'=>'Poplar Drive 3637', 'speciality'=>1],
    //     ['name'=>'Fernando', 'surname'=>'Gonzalez', 'address'=>'Beech Road 3839', 'speciality'=>5],
    //     ['name'=>'Carmen', 'surname'=>'Flores', 'address'=>'Linden Lane 4041', 'speciality'=>2],
    //     ['name'=>'Rosa', 'surname'=>'Ortega', 'address'=>'Walnut Street 4243', 'speciality'=>1],
    //     ['name'=>'Antonio', 'surname'=>'Santos', 'address'=>'Dogwood Drive 4445', 'speciality'=>3],
    //     ['name'=>'Isabel', 'surname'=>'Reyes', 'address'=>'Mulberry Lane 4647', 'speciality'=>4],
    //     ['name'=>'Pablo', 'surname'=>'Nunez', 'address'=>'Holly Avenue 4849', 'speciality'=>1],
    //     ['name'=>'Silvia', 'surname'=>'Cruz', 'address'=>'Cottonwood Lane 5051', 'speciality'=>3],
    //     ['name'=>'Daniel', 'surname'=>'Morales', 'address'=>'Redwood Road 5253', 'speciality'=>2],
    //     ['name'=>'Lucia', 'surname'=>'Ibanez', 'address'=>'Cedar Lane 5455', 'speciality'=>1],
    //     ['name'=>'Andres', 'surname'=>'Fernandez', 'address'=>'Cherry Street 5657', 'speciality'=>3],
    //     ['name'=>'Eva', 'surname'=>'Perez', 'address'=>'Elm Avenue 5859', 'speciality'=>4],
    //     ['name'=>'Mario', 'surname'=>'Molina', 'address'=>'Sycamore Lane 6061', 'speciality'=>4]];
    //     $arraySpeciality = $specialityRepository->findAll();

    // foreach ($arrayPatient as $valuePa) {        
    //     $specialityId = $valuePa['speciality'];

    //     $speciality = $entityManager->getRepository(Speciality::class)->find($specialityId);
    //     if (!$speciality) {
    //         // This will throw a exception if speciality does not exist
    //         throw $this->createNotFoundException('Speciality not found for id ' . $specialityId);
    //     }
        
    //     // We create here the new object Patient because of the behavior of symphony
    //     // in the databases, we need to relate the ID which is an entity
    //     $patient = new Patient();
    //     $patient->setName($valuePa['name']);
    //     $patient->setSurname($valuePa['surname']);
    //     $patient->setAddress($valuePa['address']);
        
    //     $patient->setSpeciality($speciality);
        
    //     $speciality->addIdSpeciality($patient);
        
    //     $entityManager->persist($patient);
    // }
    //         $entityManager->flush();                     
    //     return new Response('Datos engadidos');
    // }
    // #[Route('/', name: 'app_initial')]
    // public function crearUsuario(EntityManagerInterface $entityManager)
    // {        
    //     $user = new User();
    //     $user->setUsername('admin');
    //     $user->setPassword('abc123.');
    //     $entityManager->persist($user);
    //     $entityManager->flush();
    //     return new Response('Usuario engadido');
    // }
}
