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
use Unirest;
use App\Repository\ProjectRepository;

use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


class ProjectController extends AbstractController
{

    /**
     * @Route("/project",name="projects")
     *
     */

    public function new(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(ProjectFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            if (($this->createProjectInTestLink($data['name'], $data['description']) == 'success') and ($this->createProjectInMantis($data['name'], $data['description']) == 'success')) {
                $project = new Project();
                $project->setName($data['name']);
                $project->setIdTestlink($this->getLastID_testlink());
                $project->setIdMantis($this ->getLastID_mantis ());
                $project->setDescription($data['description']);
                $project->setCreator($this->getUser());
                $project->setDateCreated(new \DateTime('now'));

                $em->persist($project);
                $em->flush();
                return $this->redirectToRoute('dashboard', array('id' => $project->getId()));
            } else {
                dump(array('error' => 1));
            }


        }

        return $this->render('app/default/projects.html.twig', [
            'projectForm' => $form->createView()
        ]);
    }


    public function createProjectInTestLink($projectname, $description)
    {
        $headers = array('Content-Type' => 'application/json', 'Accept' => 'application/json');
        $data1 = array(
            "id" => 0,
            "name" => $projectname,
            "parent_id" => null,
            "node_type_id" => 1,
            "node_order" => 1
        );
        $body1 = Unirest\Request\Body::json($data1);
        $response = Unirest\Request::post('http://localhost:3000/api/nodes_hierarchy', $headers, $body1);
        if ($response->code == 200) {
            $responsebody = $response->body;

            $projectID = $responsebody->insertId;
            $prefix = substr(str_replace(' ', '', $projectname), 0, 5);
            $prefix = $prefix . strval($projectID);

            $data2 = array(
                "id" => $projectID,
                "notes" => $description,
                "color" => "",
                "active" => 1,
                "option_reqs" => 0,
                "option_priority" => 0,
                "option_automation" => 0,
                "options" => "O:8:\"stdClass\":4:{s:19:\"requirementsEnabled\";i:0;s:19:\"testPriorityEnabled\";i:1;s:17:\"automationEnabled\";i:1;s:16:\"inventoryEnabled\";i:0;}",
                "prefix" => $prefix,
                "tc_counter" => 0,
                "is_public" => 1,
                "issue_tracker_enabled" => 0,
                "code_tracker_enabled" => 0,
                "reqmgr_integration_enabled" => 0,
                "api_key" => hash('sha256', $projectID)
            );
            $body2 = Unirest\Request\Body::json($data2);
            $response2 = Unirest\Request::post('http://localhost:3000/api/testprojects', $headers, $body2);
            if ($response2->code == 200) {

                return 'success';
            } else {
                return 'error2';
            }
            exit();
        } else {
            return 'error1';
        }
    }


    public function createProjectInMantis($projectname, $description){
        $headers = array('Content-Type' => 'application/json', 'Accept' => 'application/json');
            $data = array(
                "id"=> 0,
                "name"=> $projectname,
                "status"=> 0,
                "enabled"=> 0,
                "view_state"=> 0,
                "access_min"=> 0,
                "file_path"=> "",
                "description"=> $description,
                "category_id"=> 0,
                "inherit_global"=> 0
            );
            $body= Unirest\Request\Body::json($data);
            $response1 = Unirest\Request::post('http://localhost:3001/api/mantis_project_table',$headers, $body);
        if($response1->code == 200){
            return 'success';
        }else{
            return 'error2';
        }
        exit();
    }


    public function getLastID_testlink (){
        $headers = array('Content-Type' => 'application/json', 'Accept' => 'application/json');
        $list = Unirest\Request::get('http://localhost:3000/api/testprojects', $headers, null);

        $listI =$list->raw_body;
        $parametersAsArray=json_decode($listI,true);
        $lastData = end($parametersAsArray);
        $lastId = $lastData['id'];
       return $lastId;
    }
    public function getLastID_mantis (){
        $headers = array('Content-Type' => 'application/json', 'Accept' => 'application/json');
        $list = Unirest\Request::get('http://localhost:3001/api/mantis_project_table', $headers, null);

        $listI =$list->raw_body;
        $parametersAsArray=json_decode($listI,true);
        $lastData = end($parametersAsArray);
        $lastId = $lastData['id'];
        return $lastId;
    }


}