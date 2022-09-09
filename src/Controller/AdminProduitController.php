<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class AdminProduitController extends AbstractController
{
    /**
     * @Route("/admin/produit/afficher", name="produit_afficher")
     */
    public function produitAfficher(ProduitRepository $repoProduit): Response
    {
        $produits = $repoProduit->findAll();

        return $this->render('admin_produit/produit_afficher.html.twig', [
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/admin/produit/ajouter", name="produit_ajouter")
     */
    public function produitAjouter(Request $request, ProduitRepository $repoProduit): Response
    {
        $produit = new Produit;

        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() AND $form->isValid()) {
            // enregistrement en BDD
            $repoProduit->add($produit, true);

            // notification
            $this->addFlash('success', 'Le produit a bien été ajouté !');

            // redirection
            return $this->redirectToRoute('produit_afficher');
        }
        
        return $this->render('admin_produit/produit_ajouter.html.twig', [
            'formProduit' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/produit/modifier/{id}", name="produit_modifier")
     */
    public function produitModifier(Produit $produit, Request $request, ProduitRepository $repoProduit): Response
    {        
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() AND $form->isValid()) {
            // enregistrement en BDD
            $repoProduit->add($produit, true);

            // notification
            $this->addFlash('success', 'Le produit a bien été modifié !');

            // redirection
            return $this->redirectToRoute('produit_afficher');
        }

        return $this->render('admin_produit/produit_modifier.html.twig', [
            'formProduit' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/produit/supprimer/{id}", name="produit_supprimer")
     */
    public function produitSupprimer(Produit $produit, ProduitRepository $repoProduit): Response
    {
        //dd($produit);
        $repoProduit->remove($produit, true);

        // notification
        $this->addFlash('success', 'Le produit a bien été supprimé !');

        // redirection
        return $this->redirectToRoute('produit_afficher');
    }


}
