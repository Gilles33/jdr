<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    private $characterName;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Test", mappedBy="defendant")
     */
    private $defending;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Test", mappedBy="initiator")
     */
    private $initiating;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserSkill", mappedBy="user")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserCarac", mappedBy="user")
     */
    private $caracs;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserDiscipline", mappedBy="user")
     */
    private $disciplines;

    /**
     * @ORM\Column(name="clan", type="string", length=120, nullable=true)
     */
    private $clan;

    /**
     * @ORM\Column(name="concept", type="string", length=120, nullable=true)
     */
    private $concept;

    /**
     * @ORM\Column(name="will", type="integer", length=5, nullable=true)
     */
    private $will;

    /**
     * @ORM\Column(name="blood_power", type="string", length=5, nullable=true)
     */
    private $bloodPower;

    /**
     * @ORM\Column(name="total_experience", type="integer", nullable=true)
     */
    private $totalExperience;

    /**
     * @ORM\Column(name="spent_experience", type="integer", nullable=true)
     */
    private $spentExperience;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * Add defending
     *
     * @param \AppBundle\Entity\Test $defending
     *
     * @return User
     */
    public function addDefending(\AppBundle\Entity\Test $defending)
    {
        $this->defending[] = $defending;

        return $this;
    }

    /**
     * Remove defending
     *
     * @param \AppBundle\Entity\Test $defending
     */
    public function removeDefending(\AppBundle\Entity\Test $defending)
    {
        $this->defending->removeElement($defending);
    }

    /**
     * Get defending
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDefending()
    {
        return $this->defending;
    }

    /**
     * Set characterName
     *
     * @param string $characterName
     *
     * @return User
     */
    public function setCharacterName($characterName)
    {
        $this->characterName = $characterName;

        return $this;
    }

    /**
     * Get characterName
     *
     * @return string
     */
    public function getCharacterName()
    {
        return $this->characterName;
    }


    /**
     * Add initiating
     *
     * @param \AppBundle\Entity\Test $initiating
     *
     * @return User
     */
    public function addInitiating(\AppBundle\Entity\Test $initiating)
    {
        $this->initiating[] = $initiating;

        return $this;
    }

    /**
     * Remove initiating
     *
     * @param \AppBundle\Entity\Test $initiating
     */
    public function removeInitiating(\AppBundle\Entity\Test $initiating)
    {
        $this->initiating->removeElement($initiating);
    }

    /**
     * Get initiating
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInitiating()
    {
        return $this->initiating;
    }

    /**
     * Set caracteristics
     *
     * @param \AppBundle\Entity\UserCarac $caracteristics
     *
     * @return User
     */
    public function setCaracteristics(\AppBundle\Entity\UserCarac $caracteristics = null)
    {
        $this->caracteristics = $caracteristics;

        return $this;
    }

    /**
     * Get caracteristics
     *
     * @return \AppBundle\Entity\UserCarac
     */
    public function getCaracteristics()
    {
        return $this->caracteristics;
    }

    /**
     * Add skill
     *
     * @param \AppBundle\Entity\UserSkill $skill
     *
     * @return User
     */
    public function addSkill(\AppBundle\Entity\UserSkill $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \AppBundle\Entity\UserSkill $skill
     */
    public function removeSkill(\AppBundle\Entity\UserSkill $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add carac
     *
     * @param \AppBundle\Entity\UserCarac $carac
     *
     * @return User
     */
    public function addCarac(\AppBundle\Entity\UserCarac $carac)
    {
        $this->caracs[] = $carac;

        return $this;
    }

    /**
     * Remove carac
     *
     * @param \AppBundle\Entity\UserCarac $carac
     */
    public function removeCarac(\AppBundle\Entity\UserCarac $carac)
    {
        $this->caracs->removeElement($carac);
    }

    /**
     * Get caracs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaracs()
    {
        return $this->caracs;
    }

    /**
     * Add discipline
     *
     * @param \AppBundle\Entity\UserDiscipline $discipline
     *
     * @return User
     */
    public function addDiscipline(\AppBundle\Entity\UserDiscipline $discipline)
    {
        $this->disciplines[] = $discipline;

        return $this;
    }

    /**
     * Remove discipline
     *
     * @param \AppBundle\Entity\UserDiscipline $discipline
     */
    public function removeDiscipline(\AppBundle\Entity\UserDiscipline $discipline)
    {
        $this->disciplines->removeElement($discipline);
    }

    /**
     * Get disciplines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisciplines()
    {
        return $this->disciplines;
    }

    /**
     * Set clan
     *
     * @param string $clan
     *
     * @return User
     */
    public function setClan($clan)
    {
        $this->clan = $clan;

        return $this;
    }

    /**
     * Get clan
     *
     * @return string
     */
    public function getClan()
    {
        return $this->clan;
    }

    /**
     * Set concept
     *
     * @param string $concept
     *
     * @return User
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;

        return $this;
    }

    /**
     * Get concept
     *
     * @return string
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * Set will
     *
     * @param integer $will
     *
     * @return User
     */
    public function setWill($will)
    {
        $this->will = $will;

        return $this;
    }

    /**
     * Get will
     *
     * @return integer
     */
    public function getWill()
    {
        return $this->will;
    }

    /**
     * Set bloodPower
     *
     * @param string $bloodPower
     *
     * @return User
     */
    public function setBloodPower($bloodPower)
    {
        $this->bloodPower = $bloodPower;

        return $this;
    }

    /**
     * Get bloodPower
     *
     * @return string
     */
    public function getBloodPower()
    {
        return $this->bloodPower;
    }

    /**
     * Set totalExperience
     *
     * @param integer $totalExperience
     *
     * @return User
     */
    public function setTotalExperience($totalExperience)
    {
        $this->totalExperience = $totalExperience;

        return $this;
    }

    /**
     * Get totalExperience
     *
     * @return integer
     */
    public function getTotalExperience()
    {
        return $this->totalExperience;
    }

    /**
     * Set spentExperience
     *
     * @param integer $spentExperience
     *
     * @return User
     */
    public function setSpentExperience($spentExperience)
    {
        $this->spentExperience = $spentExperience;

        return $this;
    }

    /**
     * Get spentExperience
     *
     * @return integer
     */
    public function getSpentExperience()
    {
        return $this->spentExperience;
    }
}
