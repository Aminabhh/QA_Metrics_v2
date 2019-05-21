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
use App\Entity\User;





class TeamController extends AbstractController
{

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
    /**
     * @Route("/delete_user{id}", name="delete_user")
     */

        public function deleteUser($id)
    {

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('team');


    }

}