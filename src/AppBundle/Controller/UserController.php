<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Test;
use AppBundle\Entity\User;
use AppBundle\Entity\UserCarac;
use AppBundle\Entity\UserSkill;
use AppBundle\Entity\UserDiscipline;
use AppBundle\Form\UserDisciplineType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CharacterType;

/**
 * Class DefaultController
 * @Route("personnage")
 */
class UserController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if ($user->hasRole('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_index');
        }

        //TODO : affiner les requetes pour ne récupérer que les tests de la partie en cours ou les 5 derniers
        //TODO : Reprendre les méthodes pour requeter les tests
        $repository = $this->getDoctrine()->getRepository(Test::class);

        $defending = $repository->findDefending($user);
        $initiating = $repository->findInitiating($user);

        return $this->render('userSpace/dashboard.html.twig', array(
            'defending' => $defending,
            'initiating' => $initiating
        ));
    }


    /**
     * @Route("/fiche/{character}", name="show_character")
     * @ParamConverter("character", class="AppBundle:User")
     */
    public function showAction(User $character)
    {

        return $this->render('userSpace/show.html.twig', array(
            'character' => $character
        ));
    }

    /**
     * @Route("/edition/{id}", name="edit_character")
     * @ParamConverter("character", class="AppBundle:User")
     */
    public function editAction(User $character, Request $request)
    {

        //initialize the caracs for a character
        if(empty($character->getCaracs()->getKeys())) {
            $repository = $this->getDoctrine()->getRepository('AppBundle:Carac');
            $em = $this->getDoctrine()->getManager();
            $results = $repository->findAll();
            foreach($results as $result) {
                $userCarac = new UserCarac();
                $userCarac->setUser($character);
                $userCarac->setCarac($result);
                $userCarac->setValue(0);
                $em->persist($userCarac);
            }
            $em->flush();
        }


        //initialize the skills for a character
        if (empty($character->getSkills()->getKeys())) {
            $repository = $this->getDoctrine()->getRepository('AppBundle:Skill');
            $em = $this->getDoctrine()->getManager();
            $results = $repository->findAll();
            foreach ($results as $result) {
                $userSkill = new UserSkill();
                $userSkill->setUser($character);
                $userSkill->setSkill($result);
                $userSkill->setValue(0);
                $em->persist($userSkill);
            }
            $em->flush();
        }

        $form = $this->createForm(CharacterType::class, $character);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($character);
            $em->flush();

            return $this->redirectToRoute('edit_character_discipline', array("id" => $character->getId()));
        }


        return $this->render('userSpace/edit_character.html.twig', array(
            'form' => $form->createView(),
            'character' => $character
        ));

    }

    /**
     * @Route("/edition/disciplines/{id}", name="edit_character_discipline")
     * @ParamConverter("character", class="AppBundle:User")
     */
    public function editDisciplineAction(Request $request, User $character)
    {
        $discipline = new UserDiscipline();
        $form = $this->createForm(UserDisciplineType::class, $discipline);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();

            $disciplines = $character->getDisciplines();
            foreach($disciplines as $item) {
                if($item->getDiscipline()->getName() == $data->getDiscipline()) {
                    $item->setValue($data->getValue());
                    $discipline = $item;
                }
            }

            $discipline->setUser($character);
            $em->persist($discipline);
            $em->flush();

            return $this->redirectToRoute("edit_character_discipline", array("id" => $character->getId()));
        }

        return $this->render('userSpace/edit_character_discipline.html.twig', array(
            'form' => $form->createView(),
            'character' => $character
        ));
    }
}