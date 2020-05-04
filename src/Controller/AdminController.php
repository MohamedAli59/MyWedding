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
     * @Route("/connexion", name="admin")
     */
    public function index()
    {
        return $this->render('admin/connexion.html.twig', [
            'controller_name' => 'AdminController',
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
     * @Route("/admin/connexion", name="security_login")
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
        return $this->render('admin/connexion.html.twig');
    }


}



