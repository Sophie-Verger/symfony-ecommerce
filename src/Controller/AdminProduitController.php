<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProduitController extends AbstractController
{
    /**
     * @Route("/admin/produit/afficher", name="produit_afficher")
     */
    public function produitAfficher(): Response
    {
        return $this->render('admin_produit/produit_afficher.html.twig');
    }
}
