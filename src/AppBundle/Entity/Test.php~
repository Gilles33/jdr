<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestRepository")
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\TestSet", cascade={"persist", "remove"})
     */
    private $initiator;

    /**
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\TestSet", cascade={"persist", "remove"})
     */
    private $defendant;


    /**
     * @var int
     *
     * @ORM\Column(name="game_master_value", type="integer", nullable=true)
     */
    private $gameMasterValue;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $winner;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_att", type="string", length=255, nullable=true)
     */
    private $summaryAtt;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_def", type="string", length=255, nullable=true)
     */
    private $summaryDef;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game", inversedBy="tests")
     */
    private $game;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




    /**
     * Set defendant
     *
     * @param string $defendant
     *
     * @return Test
     */
    public function setDefendant($defendant)
    {
        $this->defendant = $defendant;

        return $this;
    }

    /**
     * Get defendant
     *
     * @return string
     */
    public function getDefendant()
    {
        return $this->defendant;
    }

    /**
     * Set winner
     *
     * @param string $winner
     *
     * @return Test
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return string
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set summaryDef
     *
     * @param string $summaryDef
     *
     * @return Test
     */
    public function setSummaryDef($summaryDef)
    {
        $this->summaryDef = $summaryDef;

        return $this;
    }

    /**
     * Get summaryDef
     *
     * @return string
     */
    public function getSummaryDef()
    {
        return $this->summaryDef;
    }

    /**
     * Set summaryAtt
     *
     * @param string $summaryAtt
     *
     * @return Test
     */
    public function setSummaryAtt($summaryAtt)
    {
        $this->summaryAtt = $summaryAtt;

        return $this;
    }

    /**
     * Get summaryAtt
     *
     * @return string
     */
    public function getSummaryAtt()
    {
        return $this->summaryAtt;
    }


    /**
     * Set gameMasterValue
     *
     * @param integer $gameMasterValue
     *
     * @return Test
     */
    public function setGameMasterValue($gameMasterValue)
    {
        $this->gameMasterValue = $gameMasterValue;

        return $this;
    }

    /**
     * Get gameMasterValue
     *
     * @return integer
     */
    public function getGameMasterValue()
    {
        return $this->gameMasterValue;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Test
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }



    /**
     * Set initiator
     *
     * @param \AppBundle\Entity\TestSet $initiator
     *
     * @return Test
     */
    public function setInitiator(\AppBundle\Entity\TestSet $initiator = null)
    {
        $this->initiator = $initiator;

        return $this;
    }

    /**
     * Get initiator
     *
     * @return \AppBundle\Entity\TestSet
     */
    public function getInitiator()
    {
        return $this->initiator;
    }
}
