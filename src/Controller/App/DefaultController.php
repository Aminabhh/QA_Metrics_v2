<?php

namespace App\Controller\App;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="projects")
     */
    public function index()
    {
        return $this->render('app/default/projects.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        return $this->render('app/default/dashboard.html.twig');
    }

    /**
     * @Route("/add-dashboard", name="add-dashboard")
     */
    public function addDashboard()
    {
        return $this->render('app/default/add-dashboard.html.twig');
    }

    /**
     * @Route("/team", name="team")
     */
    public function team()
    {
        return $this->render('app/default/team.html.twig');
    }
}
