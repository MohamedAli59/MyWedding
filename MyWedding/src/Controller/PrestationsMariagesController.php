<?php

namespace App\Controller;

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
