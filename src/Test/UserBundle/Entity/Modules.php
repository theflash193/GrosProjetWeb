<?php
// src/Test/UserBundle/Entity/Modules.php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="sym_modules")
 */
class Modules
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="maxusers", type="integer")
     */
    protected $maxusers;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var \DateTime
     * @ORM\Column(name="datestartinscription", type="datetime")
     */
    protected $datestartinscription;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateendinscription", type="datetime")
     */
    protected $dateendinscription;
    /**
     * @var \DateTime
     * @ORM\Column(name="datestartmodule", type="datetime")
     */
    protected $datestartmodule;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateendmodule", type="datetime")
     */
    protected $dateendmodule;

    /**
     * @ORM\Column(name="credits", type="integer")
     */
    protected $credits;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Modules
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set maxusers
     *
     * @param integer $maxusers
     * @return Modules
     */
    public function setMaxusers($maxusers)
    {
        $this->maxusers = $maxusers;

        return $this;
    }

    /**
     * Get maxusers
     *
     * @return integer 
     */
    public function getMaxusers()
    {
        return $this->maxusers;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Modules
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datestartinscription
     *
     * @param \DateTime $datestartinscription
     * @return Modules
     */
    public function setDatestartinscription($datestartinscription)
    {
        $this->datestartinscription = $datestartinscription;

        return $this;
    }

    /**
     * Get datestartinscription
     *
     * @return \DateTime 
     */
    public function getDatestartinscription()
    {
        return $this->datestartinscription;
    }

    /**
     * Set dateendinscription
     *
     * @param \DateTime $dateendinscription
     * @return Modules
     */
    public function setDateendinscription($dateendinscription)
    {
        $this->dateendinscription = $dateendinscription;

        return $this;
    }

    /**
     * Get dateendinscription
     *
     * @return \DateTime 
     */
    public function getDateendinscription()
    {
        return $this->dateendinscription;
    }

    /**
     * Set datestartmodule
     *
     * @param \DateTime $datestartmodule
     * @return Modules
     */
    public function setDatestartmodule($datestartmodule)
    {
        $this->datestartmodule = $datestartmodule;

        return $this;
    }

    /**
     * Get datestartmodule
     *
     * @return \DateTime 
     */
    public function getDatestartmodule()
    {
        return $this->datestartmodule;
    }

    /**
     * Set dateendmodule
     *
     * @param \DateTime $dateendmodule
     * @return Modules
     */
    public function setDateendmodule($dateendmodule)
    {
        $this->dateendmodule = $dateendmodule;

        return $this;
    }

    /**
     * Get dateendmodule
     *
     * @return \DateTime 
     */
    public function getDateendmodule()
    {
        return $this->dateendmodule;
    }

    /**
     * Set credits
     *
     * @param integer $credits
     * @return Modules
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Get credits
     *
     * @return integer 
     */
    public function getCredits()
    {
        return $this->credits;
    }
}
