<?php
/**
 * Created by PhpStorm.
 * User: Win10-Space
 * Date: 18/04/2019
 * Time: 09:43
 */
namespace App\Controller\App;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProjectController extends AbstractController{
    /**
     * @Route("/project",name="projects")
     */
    public function index()
    {
        return $this->render('app/default/projects.html.twig');
    }
}