<?php

namespace App\Controller;

use App\Entity\Student;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class StudentController extends Controller {

    /**
     * @Route("/student/info/react")
     * @Method({"GET"})
     */
    public function responseToRactOnShowStudents(){
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $students = $this->getDoctrine()->getRepository(Student::class)->findAll(); 
        $jsonContent = $serializer->serialize($students, 'json');
        
        return new Response($jsonContent);
        // return new Response(json_encode($jsonContent));
        // return $this->render('student/index.html.twig', array('students' => $students));

    }
   
    /**
      * @Route("/students/information", name="show_all_students")
      */
      public function showStudents()
      {
          //$number = mt_rand(0, 100);
          $name = "students Information";
          
          return $this->render('student/information.html.twig', array(
              'name' => $name,
          ));
          
      }
   

    /**
     * @Route("/student/save")
     * @Method({"POST"})
     */
    public function save(Request $request){

        
        $data = json_decode($request->getContent(), true);        
        $name = "students Information";
        
        $student= new Student();

        $student->setFirstName($data['firstName']);
        $student->setLastName($data['lastName']);
        $student->setDepartment($data['department']);
        $student->setrollNumber($data['rollNumber']);
        $student->setGender($data['gender']);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($student);
        $entityManager->flush();

        return $this->render('student/information.html.twig', array(
            'name' => $name,
        ));
        // return new Response(json_encode($data));
    }
   

    /**
     * @Route("/student/create")
     */
    public function createNewStudent(){

        return $this->render('student/newStudent.html.twig');    
    }

    /**
     * @Route("/student/savehardcoded", name="student_hardCodedData")
     */
    public function saveStudent()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $student = new Student();
        $student->setFirstName('Pori');
        $student->setLastName('Angle');
        $student->setDepartment('DSS');
        $student->setrollNumber(2254);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($student);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new student with id '.$student->getId());
    }
   
}