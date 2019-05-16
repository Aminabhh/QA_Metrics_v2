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
        $data = [12, 19, 3, 5, 2, 3];


        return $this->render('app/default/dashboard.html.twig',array('data' => $data));
    }

    /**
     * @Route("/team", name="team")
     */
    public function team()
    {
        return $this->render('app/default/team.html.twig');
    }

}

