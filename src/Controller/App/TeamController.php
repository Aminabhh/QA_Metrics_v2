<?php
/**
 * Created by PhpStorm.
 * User: Win10-Space
 * Date: 19/04/2019
 * Time: 09:44
 */
namespace App\Controller\App;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;




class TeamController extends AbstractController {

    /**
     * @Route("/team", name="team")
     */


    public function list(UserRepository $userRepo)
    {
        $users = $userRepo->findAll();
        return $this->render('app/default/team.html.twig', [
            'users' => $users,
        ]);
    }
}
