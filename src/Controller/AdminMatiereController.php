<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\MatiereType;
use App\Repository\MatiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/matiere")
 */
class AdminMatiereController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_matiere_index", methods={"GET"})
     */
    public function index(MatiereRepository $matiereRepository): Response
    {
        return $this->render('admin_matiere/index.html.twig', [
            'matieres' => $matiereRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_matiere_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MatiereRepository $matiereRepository): Response
    {
        $matiere = new Matiere();
        $form = $this->createForm(MatiereType::class, $matiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $matiereRepository->add($matiere, true);

            return $this->redirectToRoute('app_admin_matiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_matiere/new.html.twig', [
            'matiere' => $matiere,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_matiere_show", methods={"GET"})
     */
    public function show(Matiere $matiere): Response
    {
        return $this->render('admin_matiere/show.html.twig', [
            'matiere' => $matiere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_matiere_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Matiere $matiere, MatiereRepository $matiereRepository): Response
    {
        $form = $this->createForm(MatiereType::class, $matiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $matiereRepository->add($matiere, true);

            return $this->redirectToRoute('app_admin_matiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_matiere/edit.html.twig', [
            'matiere' => $matiere,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/delete", name="app_admin_matiere_delete")
     */
    public function delete(Request $request, Matiere $matiere, MatiereRepository $matiereRepository): Response
    {
        //if ($this->isCsrfTokenValid('delete'.$matiere->getId(), $request->request->get('_token'))) {
            $matiereRepository->remove($matiere, true);
        //}

        return $this->redirectToRoute('app_admin_matiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
