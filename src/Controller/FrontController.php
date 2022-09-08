<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
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
     * @Route("", name="home")
     */
    public function home():Response
    {
        return $this->render('front/home.html.twig');
    }

    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogue(ProduitRepository $repoProduit):Response
    {
        $produits = $repoProduit->findAll();
        return $this->render('front/catalogue.html.twig', [
            'produits' => $produits,
        ]);
    }


    /**
     * @Route("/fiche_produit/{id}", name="fiche_produit")
     */
    public function fiche_produit(Produit $produit):Response
    {
        return $this->render('front/fiche_produit.html.twig', [
            'produit' => $produit,
        ]);
    }


}
