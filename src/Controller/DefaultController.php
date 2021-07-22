<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {
    
    /**
    * @Route("/", name="app_index")
    */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }


    /**
    * @Route("/sad", name="app_sad")
    */
    public function sad(): Response
    {
        return $this->render('Sentences/sad.html.twig');
    }

    /**
    * @Route("/happy", name="app_happy")
    */
    public function happy(): Response
    {
        return $this->render('Sentences/happy.html.twig');
    }
 
}