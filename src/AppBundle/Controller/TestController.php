<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 18/02/18
 * Time: 19:57
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Test;
use AppBundle\Entity\TestSet;
use AppBundle\Form\TestSetType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TestType;
use AppBundle\Form\StaticTestType;
use AppBundle\Service\TestCalculator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TestController
 * @package AppBundle\Controller
 * @Route("/test")
 */
class TestController extends Controller
{

    /**
     * @Route("/", name="test_initiate")
     */
    public function initiateAction(Request $request) {


        $test = new Test();
        $character = $this->getUser();

        $form = $this->createForm(TestType::class, $test, ['character' => $character]);
        $form->handleRequest($request);
        //TODO : Bloquer la possibilité de se choisir soi-même.
        if($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $test->getInitiator()->setUser($character);
            $em->persist($test);
            $em->flush();
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('test/initiate.html.twig', array(
            'form' => $form->createView()
        ));

    }

    /**
     * @Route("/test-statique", name="test_static")
     */
    public function initiateStaticTestAction(Request $request) {

        $test = new Test();
        $user = $this->getUser();

        $form = $this->createForm(StaticTestType::class, $test);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($test);
            $em->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('test/game_master.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/defendre/{id}", name="test_defend")
     * @ParamConverter("test", class="AppBundle:Test")
     */
    public function defendAction(Test $test, Request $request)
    {
        if($test->getWinner() !== null) {
            return $this->redirectToRoute('test_result',array('test' => $test->getId()));
        }

        if ($this->getUser() == $test->getDefendant()->getUser()) {

            $defendantSet = $test->getDefendant();
            $form = $this->createForm(TestSetType::class, $defendantSet);

            $form->handleRequest($request);
            //TODO : Bloquer la possibilité de choisir deux fois la même carac
            if ($form->isValid() && $form->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($test);
                $em->flush();
                return $this->redirectToRoute('test_result', array('test' => $test->getId()));
            }

        } else {
            throw $this->createNotFoundException();
        }


        return $this->render('test/defend.html.twig', array (
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/resultat/{test}", name="test_result")
     * @ParamConverter("test", class="AppBundle:Test")
     */
    public function resultAction(Test $test, TestCalculator $testCalculator)
    {
        $testDefendantSet = $test->getDefendant();
        if($testDefendantSet->getCarac() === null) {
            throw new NotFoundHttpException("Le résultat n'existe pas");
        }
        $result['winner'] = $test->getWinner();
        $user = $this->getUser();
        $summaryAtt = "";
        $summaryDef = "";

        if ($user == $test->getDefendant()->getUser() && $test->getGameMasterValue() == null && $result['winner'] == null) {
            $result = $testCalculator->oppositionTest($test);

            foreach ($result['attValues'] as $key => $value) {
                $summaryAtt .= $key . " (" . $value . ") ";
            };

            foreach ($result['defValues'] as $key => $value) {
                $summaryDef .= $key . "(" . $value . ") ";
            };

            $em = $this->getDoctrine()->getManager();
            $test->setSummaryAtt($summaryAtt);
            $test->setSummaryDef($summaryDef);
            $test->setWinner($result['winner']);
            $em->persist($test);
            $em->flush();
        } else if (is_null($result['winner']) && !is_null($test->getGameMasterValue()))
        {
            $result = $testCalculator->staticTest($test);
            foreach ($result['defValues'] as $key => $value) {
                    $summaryDef .= $key . " (" . $value . ") ";
            };
            $em = $this->getDoctrine()->getManager();
            $test->setSummaryDef($summaryDef);
            $test->setWinner($result['winner']);
            $em->persist($test);
            $em->flush();
        }

        return $this->render('test/result.html.twig', array(
            'result' => $result
        ));
    }
}