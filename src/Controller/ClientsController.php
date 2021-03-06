<?php

namespace App\Controller;

use App\Entity\Adresses;
use App\Entity\Clients;
use App\Form\ClientsType;
use App\Repository\ClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin")
 */
class ClientsController extends AbstractController
{
    /**
     * @Route("/clients", name="clients_index", methods={"GET"})
     */
    public function index(ClientsRepository $clientsRepository): Response
    {
        return $this->render('clients/index.html.twig', [
            'clients' => $clientsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/clients/new", name="clients_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $client = new Clients();
        $form = $this->createForm(ClientsType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('clients_index');
        }

        return $this->render('clients/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/clients/{id}", name="clients_show", methods={"GET"})
     */
    public function show(Clients $client,Adresses $adresses): Response
    {
        return $this->render('clients/show.html.twig', [
            'client' => $client,
            'adresse' => $adresses,
        ]);
    }

    /**
     * @Route("/clients/{id}/edit", name="clients_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Clients $client, Adresses $adresses): Response
    {
        $form = $this->createForm(ClientsType::class, $client);
        $form->remove('mariage');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager1 = $this->getDoctrine()->getManager();
            $client->setDateUpdate(new \DateTime());
            $adresses->setDateUpdate(new \DateTime());
            $entityManager->persist($client);
            $entityManager->flush();
            $entityManager1->persist($adresses);
            $entityManager1->flush();


            return $this->redirectToRoute('clients_index');
        }

        return $this->render('clients/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/clients/{id}", name="clients_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Clients $client): Response
    {
        if ($this->isCsrfTokenValid('delete' . $client->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clients_index');
    }
}
