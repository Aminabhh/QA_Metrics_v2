<?php
/**
 * Created by PhpStorm.
 * User: Win10-Space
 * Date: 15/05/2019
 * Time: 23:50
 */

namespace App\Controller\App;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends  AbstractController
{
    /**
     * @Route("/dashboard/testkpi",name="DaKPI")
     *
     */
    function testKPI(){
        $data = [1,5,8,9,7,10];
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}