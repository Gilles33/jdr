<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 23/02/18
 * Time: 13:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
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

    /**
     * @Route("/personnage/supprimer/{id}", name="delete_character")
     */
    public function deleteCharacterAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('character_list');

    }


}