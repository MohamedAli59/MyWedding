<?php

namespace App\Controller;

use App\Entity\Commentaires;
use App\Entity\Mariages;
use App\Entity\Prestations;
use App\Form\CommentairesType;
use App\Form\MariagesType;
use App\Repository\MariagesRepository;
use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mariages")
 */
class MariagesController extends AbstractController
{
    /**
     * @Route("/", name="mariages_index", methods={"GET"})
     */
    public function index(MariagesRepository $mariagesRepository): Response
    {
        return $this->render('mariages/index.html.twig', [
            'mariages' => $mariagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mariages_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mariage = new Mariages();
        $form = $this->createForm(MariagesType::class, $mariage);
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
     * @Route("/{id}", name="mariages_show", methods={"GET","POST"})
     */
    public function show(Mariages $mariage,Request $request,PrestationsRepository $prestationsRepository): Response
    {
        $commentaires = new Commentaires();
        $form = $this->createForm(CommentairesType::class, $commentaires);
        $form->handleRequest($request);
        $users = $this->getUser();



        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $commentaires->setMariage($mariage);
            $commentaires->setClient($users);  // pour set l'id de l'utilisateur
            $entityManager->persist($commentaires);
            $entityManager->flush();
            return $this->redirectToRoute('mariages_show', ['id' => $mariage->getid()]);
        }

        $prestations = $prestationsRepository->findAll();
        $client = $mariage->getClient();
        $prestationM = $mariage->getPrestationMariage();


        $commentaire = $mariage->getCommentaire();

        return $this->render('mariages/show.html.twig', [
            'mariage' => $mariage,
            'client' => $client,
            'prestationM' => $prestationM,
            'commentaire' => $commentaire,
            'prestations' => $prestations,
            'commentaires' => $commentaires,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mariages_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mariages $mariage): Response
    {
        $form = $this->createForm(MariagesType::class, $mariage);
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
     * @Route("/{id}", name="mariages_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mariages $mariage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $mariage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mariage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mariages_index');
    }
}
