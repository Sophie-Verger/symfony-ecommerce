<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="frontName")
     */
    public function front():Response
    {
        $prenomController = 'Sophie';

        // permet de retourner la vue associé à la fonction
        return $this->render('front/front.html.twig', [
            'prenomTwig' => $prenomController,
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home():Response
    {
        return $this->render('front/home.html.twig');
    }




}
