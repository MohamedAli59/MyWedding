<?php

namespace App\Controller;

use App\Entity\Prestations;
use App\Entity\PrestationsMariages;
use App\Form\PrestationsMariagesType;
use App\Repository\PrestationsMariagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prestations/mariages")
 */
class PrestationsMariagesController extends AbstractController
{
    /**
     * @Route("/", name="prestations_mariages_index", methods={"GET"})
     */
    public function index(PrestationsMariagesRepository $prestationsMariagesRepository): Response
    {
        return $this->render('prestations_mariages/index.html.twig', [
            'prestations_mariages' => $prestationsMariagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="prestations_mariages_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $prestationsMariage = new PrestationsMariages();

        $form = $this->createForm(PrestationsMariagesType::class, $prestationsMariage);
        $form->handleRequest($request);




        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prestationsMariage);
            $entityManager->flush();

            return $this->redirectToRoute('prestations_mariages_index');
        }

        return $this->render('prestations_mariages/new.html.twig', [
            'prestations_mariage' => $prestationsMariage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prestations_mariages_show", methods={"GET"})
     */
    public function show(PrestationsMariages $prestationsMariage): Response
    {
        return $this->render('prestations_mariages/show.html.twig', [
            'prestations_mariage' => $prestationsMariage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prestations_mariages_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PrestationsMariages $prestationsMariage): Response
    {
        $form = $this->createForm(PrestationsMariagesType::class, $prestationsMariage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prestations_mariages_index');
        }

        return $this->render('prestations_mariages/edit.html.twig', [
            'prestations_mariage' => $prestationsMariage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prestations_mariages_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PrestationsMariages $prestationsMariage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prestationsMariage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prestationsMariage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prestations_mariages_index');
    }
}
