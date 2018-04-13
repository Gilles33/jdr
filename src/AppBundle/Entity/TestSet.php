<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestSet
 *
 * @ORM\Table(name="test_set")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestSetRepository")
 */
class TestSet
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserCarac");
     * @ORM\JoinColumn(nullable=true)
     */
    private $carac;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserSkill");
     * @ORM\JoinColumn(nullable=true)
     */
    private $skill;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserDiscipline");
     * @ORM\JoinColumn(nullable=true)
     */
    private $discipline;



    public function __toString()
    {
        return $this->getUser()->getCharacterName();
    }

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
     * Set user
     *
     * @param string $user
     *
     * @return TestSet
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set carac
     *
     * @param string $carac
     *
     * @return TestSet
     */
    public function setCarac($carac)
    {
        $this->carac = $carac;

        return $this;
    }

    /**
     * Get carac
     *
     * @return string
     */
    public function getCarac()
    {
        return $this->carac;
    }

    /**
     * Set skill
     *
     * @param string $skill
     *
     * @return TestSet
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return string
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set discipline
     *
     * @param string $discipline
     *
     * @return TestSet
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;

        return $this;
    }

    /**
     * Get discipline
     *
     * @return string
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }
}
