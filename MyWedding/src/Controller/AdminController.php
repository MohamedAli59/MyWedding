<?php

namespace App\Controller;
use App\Entity\PrestationsMariages;
use App\Form\PrestationsMariagesType;
use App\Repository\PrestationsMariagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Prestations;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/prestations/mariages", name="prestations_mariages_index", methods={"GET"})
     */
    public function index1(PrestationsMariagesRepository $prestationsMariagesRepository): Response
    {
        return $this->render('prestations_mariages/index.html.twig', [
            'prestations_mariages' => $prestationsMariagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/prestations/mariages/new", name="prestations_mariages_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        dd($request);
        $prestationsMariage = new PrestationsMariages();
        $form = $this->createForm(PrestationsMariagesType::class, $prestationsMariage);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prestationsMariage);
            $entityManager->flush();

            return $this->redirectToRoute('prestations_mariages_index');
        }
        ;
        return $this->render('prestations_mariages/new.html.twig', [
            'prestations_mariage' => $prestationsMariage,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/admin/accueil", name="admin_Accueil")
     */
    public function indexCo()
    {
        return $this->render('admin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


    /**
     * @Route("/connexion", name="security_login")
     */
    public function login()
    {
        return $this->render('admin.html.twig');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        return $this->render('admin/index.html.twig');
    }


}



