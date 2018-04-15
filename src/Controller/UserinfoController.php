<?php

namespace App\Controller;

 use Symfony\Component\Routing\Annotation\Route;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\Request;
 use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UserinfoController extends Controller
{
     /**
      * @Route("/user/information")
      */
    public function showUsers()
    {
        //$number = mt_rand(0, 100);
        $name = "User Information";
        
        return $this->render('user/information.html.twig', array(
            'name' => $name,
        ));
        
    }

    /**
     * @Route("/user/info/react", name="halim")
     */
    public function responseToRactOnShowUsers(){
        $users = [
            ['id' => '1', 'firstName' => 'Mihrab', 'lastName' => 'Hena', 'gender'=>'Male'],
            ['id' => '2', 'firstName' => 'Zakaria','lastName' => 'Mohammod','gender'=>'Male'],
            ['id' => '3', 'firstName' => 'Naim','lastName' => 'Huq','gender'=>'Female']
        ];
        return new Response(json_encode($users));
    }
}