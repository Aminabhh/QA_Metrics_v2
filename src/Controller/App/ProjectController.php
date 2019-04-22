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
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Project;
use App\Form\ProjectFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProjectRepository;



class ProjectController extends AbstractController{

    /**
     * @Route("/project",name="projects")
     *
     */

    public function new(EntityManagerInterface $em , Request $request)
    {
        $form = $this->createForm(ProjectFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $project = new Project();
            $project->setName($data['name']);
            $project->setIdTestlink($data['id_testlink']);
            $project->setIdMantis($data['id_mantis']);
            $project->setDescription($data['description']);
            $project->setCreator($this->getUser());
            $project->setDateCreated(new \DateTime('now'));


            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('dashboard',array('id' => $project->getId()));
        }

        return $this->render('app/default/projects.html.twig', [
            'projectForm' => $form->createView()
        ]);
    }


}