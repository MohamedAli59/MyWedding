<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Entity\Commentaires;
use App\Entity\Mariages;
use App\Entity\PrestationsMariages;
use App\Form\CommentairesType;
use App\Form\MariagesType;
use App\Repository\MariagesRepository;
use App\Repository\PrestationsMariagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class MariagesController extends AbstractController
{
    /**
     * @Route("/mariages", name="mariages_index", methods={"GET"})
     */
    public function index(MariagesRepository $mariagesRepository): Response
    {
        return $this->render('mariages/index.html.twig', [
            'mariages' => $mariagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/mariages/new", name="mariages_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mariage = new Mariages();
        $form = $this->createForm(MariagesType::class, $mariage);
        $form->remove('prestation');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mariage);
            $entityManager->flush();

            return $this->redirectToRoute('mariages_index');
        }

        return $this->render('mariages/new.html.twig', [
            'mariage' => $mariage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mariages/{id}", name="mariages_show", methods={"GET","POST"})
     */
     public function show(Mariages $mariage,Request $request): Response
    {

        // <----------------------------------- Commentaire ----------------------------------------------------------->
        $commentaires = new Commentaires();
        $form = $this->createForm(CommentairesType::class, $commentaires);
        $form->handleRequest($request);
        $users = $this->getUser();  // Recupération de l'ID de la personne qui écrit le commentaire
        //<------------------------------------------------------------------------------------------------------------>


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $commentaires->setMariage($mariage); // Associé le commentaire au Mariage
            $commentaires->setClient($users);  // pour set l'id de l'utilisateur
            $entityManager->persist($commentaires);
            $entityManager->flush();
            return $this->redirectToRoute('mariages_show', ['id' => $mariage->getid()]);
        }



        // <----------------------------------- Liste Prestations ----------------------------------------------------->


        $form1 = $this->createForm(MariagesType::class, $mariage);
        $form1->remove('Nom');
        $form1->remove('Date');
        $form1->remove('Lieu');
        $form1->remove('NB_Invites');
        $form1->remove('Budget');
        $form1->handleRequest($request);

        //$form1->remove('prestationsMariages');
        //dd($request);

        if ($form1->isSubmitted() && $form1->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('mariages_show', ['id' => $mariage->getid()]);
        }



        //<------------------------------------------------------------------------------------------------------------>


        $client = $mariage->getClient();
        $commentaire = $mariage->getCommentaire();
        $PrestaM = $mariage->getPrestationsMariages();

        return $this->render('mariages/show.html.twig', [
            'mariage' => $mariage,
            'client' => $client,
            'commentaire' => $commentaire,
            'commentaires' => $commentaires,
            'PrestaM'=> $PrestaM,
            'form' => $form->createView(),
            'form1' => $form1->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="mariages_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mariages $mariage): Response
    {
        $form = $this->createForm(MariagesType::class, $mariage);
        $form->remove('prestation');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $mariage->setDateUpdate(new \DateTime());
            $entityManager->persist($mariage);
            $entityManager->flush();

            return $this->redirectToRoute('mariages_index');
        }

        return $this->render('mariages/edit.html.twig', [
            'mariage' => $mariage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mariages/{id}", name="mariages_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mariages $mariage, Clients $clients, Commentaires $commentaires): Response
    {
        if ($this->isCsrfTokenValid('delete' . $mariage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mariage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mariages_index');
    }
}
