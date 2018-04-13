<?php

namespace AppBundle\Service;


use AppBundle\Entity\Test;
use AppBundle\Entity\TestSet;
use Doctrine\ORM\EntityManager;

class TestCalculator
{
    protected $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function oppositionTest(Test $test)
    {
        $initiatorSet = $test->getInitiator();
        $defendantSet = $test->getDefendant();
        $initiator = $initiatorSet->getUser();
        $defendant = $defendantSet->getUser();

        $attValues = $this->prepareValues($initiatorSet);
        $defValues = $this->prepareValues($defendantSet);

        $totalAtt = 0;
        foreach ($attValues as $key => $value) {
            $totalAtt += $value;
        }
        $totalDef = 0;
        foreach ($defValues as $key => $value) {
                $totalDef += $value;
        }


        //TODO : prévoir malus si blessure importante à l'aide de if pour modifier le resultat du SUM.
        //TODO : Aménager les règles selon les cas d'égalités, notamment en rapport avec la puissance du sang.

        if ($totalAtt >= $totalDef) {
            $winner = $initiator;
        } else {
            $winner = $defendant;
        }

        $result = array(
            'attValues' => $attValues,
            'defValues' => $defValues,
            'winner' => $winner
        );
        return $result;
    }



    public function staticTest(Test $test) {
        $defendantSet = $test->getDefendant();
        $defendant = $defendantSet->getUser();
        $gameMasterValue = $test->getGameMasterValue();
        $defValues= $this->prepareValues($defendantSet);

        $totalDef = 0;
        foreach ($defValues as $key => $value) {
                $totalDef += $value;
        }

        if($totalDef >= $gameMasterValue) {
            $winner = $defendant;
        } else {
            $winner = $this->em->getRepository('AppBundle:User')->findOneBy(['id' => 1]);
        }

        $result = array(
            'winner' => $winner,
            'defValues' => $defValues
        );

        return $result;

    }
    public function prepareValues(Testset $testSet)
    {
        //TODO : prévoir malus si blessure importante à l'aide de if pour modifier le resultat du SUM.
        //TODO : Aménager les règles selon les cas d'égalités, notamment en rapport avec la puissance du sang.
        $caracName = null;
        $skillName = null;
        $disciplineName = null;
        $carac = 0;
        $skill = 0;
        $discipline = 0;

        if($testSet->getCarac() !== null) {
            $caracName = (string)$testSet->getCarac();
            $carac = $testSet->getCarac()->getValue();
        }
        if($testSet->getSkill() !== null) {
            $skillName = (string)$testSet->getSkill();
            $skill = $testSet->getSkill()->getValue();
        }
        if($testSet->getDiscipline() !== null) {
            $disciplineName = (string)$testSet->getDiscipline();
            $discipline = $testSet->getDiscipline()->getValue();
        }

        $setValues = [
            $caracName => $carac,
            $skillName => $skill,
            $disciplineName => $discipline,
        ];

        return $setValues;
    }
}