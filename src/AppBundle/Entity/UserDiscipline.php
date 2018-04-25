<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserDiscipline
 *
 * @ORM\Table(name="user_discipline")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserDisciplineRepository")
 */
class UserDiscipline
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
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="disciplines")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Discipline")
     */
    private $discipline;

    /**
     * @var int
     *
     * @ORM\Column(name="value", type="smallint")
     * @Assert\Range(
     *     min=0,
     *     max=5,
     *     minMessage="la valeur doit être positive",
     *     maxMessage="la valeur ne peut être supérieure à 5"
     * )
     */
    private $value;

    public function __toString()
    {
        return $this->discipline . " ";
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
     * @return UserDiscipline
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
     * Set discipline
     *
     * @param string $discipline
     *
     * @return UserDiscipline
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

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return UserDiscipline
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}
