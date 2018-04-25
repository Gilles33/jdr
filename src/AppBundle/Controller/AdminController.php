<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 23/02/18
 * Time: 13:47
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Test;

/**
 * @Route("admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_index")
     */
    public function indexAction()
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()->getRepository(Test::class);
        $initiating = $repository->findBy([
            'initiator' => $this->getUser(),
            'winner' => null
        ]);

        $results = $repository->findTenByAdminUser($user);


        return $this->render('admin/index.html.twig', array(
            'initiating' => $initiating,
            'results' => $results
        ));
    }

    /**
     * @Route("/liste-des-personnages", name="character_list")
     */
    public function listCharacterAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $users = $repository->findAll();

        return $this->render('admin/character_list.html.twig', array(
            'users' => $users
        ));
    }



}