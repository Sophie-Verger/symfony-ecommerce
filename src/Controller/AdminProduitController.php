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

    /**
     * @Route("/admin/produit/ajouter", name="produit_ajouter")
     */
    public function produitAjouter(): Response
    {
        return $this->render('admin_produit/produit_ajouter.html.twig');
    }

    /**
     * @Route("/admin/produit/modifier", name="produit_modifier")
     */
    public function produitModifier(): Response
    {
        return $this->render('admin_produit/produit_modifier.html.twig');
    }

    /**
     * @Route("/admin/produit/supprimer", name="produit_supprimer")
     */
    public function produitSupprimer(): Response
    {
        return $this->render('admin_produit/produit_supprimer.html.twig');
    }


}
