<?php

namespace App\Controller\App;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class DefaultController extends AbstractController
{



    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        return $this->render('app/default/index.html.twig');
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

