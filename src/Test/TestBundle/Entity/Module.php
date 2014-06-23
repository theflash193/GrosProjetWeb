<?php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Module
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxusers", type="integer")
     */
    private $maxusers;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datestartinscription", type="datetime")
     */
    private $datestartinscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateendinscription", type="datetime")
     */
    private $dateendinscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datestartmodule", type="datetime")
     */
    private $datestartmodule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateendmodule", type="datetime")
     */
    private $dateendmodule;

    /**
     * @var integer
     *
     * @ORM\Column(name="credits", type="integer")
     */
    private $credits;


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
     * @return Module
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
     * @return Module
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
     * @return Module
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
     * @return Module
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
     * @return Module
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
     * @return Module
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
     * @return Module
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
     * @return Module
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
