<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * UserCarac
 *
 * @ORM\Table(name="user_carac")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserCaracRepository")
 */
class UserCarac
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="caracs")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Carac")
     */
    private $carac;

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
        return $this->carac . "";
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
     * @param \AppBundle\Entity\User $user
     *
     * @return UserCarac
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return UserCarac
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set carac
     *
     * @param \AppBundle\Entity\Carac $carac
     *
     * @return UserCarac
     */
    public function setCarac(\AppBundle\Entity\Carac $carac = null)
    {
        $this->carac = $carac;

        return $this;
    }

    /**
     * Get carac
     *
     * @return \AppBundle\Entity\Carac
     */
    public function getCarac()
    {
        return $this->carac;
    }
}
