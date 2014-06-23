<?php
// src/Test/UserBundle/Entity/Activities.php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Test\UserBundle\Entity\Modules as ConcreteModule;

/**
 * @ORM\Entity
 * @ORM\Table(name="sym_activities")
 */
class Activities
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="moduleid", type="integer")
     */

    protected $type;

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
     * @ORM\Column(name="file1", type="string")
     */
    protected $file1;

    /**
     * @ORM\Column(name="file2", type="string", nullable=true)
     */
    protected $file2;

    /**
     * @ORM\Column(name="file3", type="string", nullable=true)
     */
    protected $file3;

    /**
     * @ORM\Column(name="file4", type="string", nullable=true)
     */
    protected $file4;
 
    /**
     * @ORM\Column(name="file5", type="string", nullable=true)
     */
    protected $file5;

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
     * @ORM\Column(name="datestartactivity", type="datetime")
     */
    protected $datestartactivity;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateendactivity", type="datetime")
     */
    protected $dateendactivity;

    /**
     * @ORM\Column(name="groupminusers", type="integer")
     */
    protected $groupminusers;

    /**
     * @ORM\Column(name="groupmaxusers", type="integer")
     */
    protected $groupmaxusers;

    /**
     * @ORM\ManyToOne(targetEntity="\Test\UserBundle\Entity\Modules")
     * @ORM\JoinColumn(nullable=false, name="modules_id", referencedColumnName="id")
     */
    protected $modules;

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
     * Set type
     *
     * @param integer $type
     * @return Activities
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * @return Activities
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
     * Set datestartactivity
     *
     * @param \DateTime $datestartactivity
     * @return Activities
     */
    public function setDatestartactivity($datestartactivity)
    {
        $this->datestartactivity = $datestartactivity;

        return $this;
    }

    /**
     * Get datestartactivity
     *
     * @return \DateTime 
     */
    public function getDatestartactivity()
    {
        return $this->datestartactivity;
    }

    /**
     * Set dateendactivity
     *
     * @param \DateTime $dateendactivity
     * @return Activities
     */
    public function setDateendactivity($dateendactivity)
    {
        $this->dateendactivity = $dateendactivity;

        return $this;
    }

    /**
     * Get dateendactivity
     *
     * @return \DateTime 
     */
    public function getDateendactivity()
    {
        return $this->dateendactivity;
    }

    /**
     * Set groupminusers
     *
     * @param integer $groupminusers
     * @return Activities
     */
    public function setGroupminusers($groupminusers)
    {
        $this->groupminusers = $groupminusers;

        return $this;
    }

    /**
     * Get groupminusers
     *
     * @return integer 
     */
    public function getGroupminusers()
    {
        return $this->groupminusers;
    }

    /**
     * Set groupmaxusers
     *
     * @param integer $groupmaxusers
     * @return Activities
     */
    public function setGroupmaxusers($groupmaxusers)
    {
        $this->groupmaxusers = $groupmaxusers;

        return $this;
    }

    /**
     * Get groupmaxusers
     *
     * @return integer 
     */
    public function getGroupmaxusers()
    {
        return $this->groupmaxusers;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Activities
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file1
     *
     * @param string $file1
     * @return Activities
     */
    public function setFile1($file1)
    {
        $this->file1 = $file1;

        return $this;
    }

    /**
     * Get file1
     *
     * @return string 
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * Set file2
     *
     * @param string $file2
     * @return Activities
     */
    public function setFile2($file2)
    {
        $this->file2 = $file2;

        return $this;
    }

    /**
     * Get file2
     *
     * @return string 
     */
    public function getFile2()
    {
        return $this->file2;
    }

    /**
     * Set file3
     *
     * @param string $file3
     * @return Activities
     */
    public function setFile3($file3)
    {
        $this->file3 = $file3;

        return $this;
    }

    /**
     * Get file3
     *
     * @return string 
     */
    public function getFile3()
    {
        return $this->file3;
    }

    /**
     * Set file4
     *
     * @param string $file4
     * @return Activities
     */
    public function setFile4($file4)
    {
        $this->file4 = $file4;

        return $this;
    }

    /**
     * Get file4
     *
     * @return string 
     */
    public function getFile4()
    {
        return $this->file4;
    }

    /**
     * Set file5
     *
     * @param string $file5
     * @return Activities
     */
    public function setFile5($file5)
    {
        $this->file5 = $file5;

        return $this;
    }

    /**
     * Get file5
     *
     * @return string 
     */
    public function getFile5()
    {
        return $this->file5;
    }

    /**
     * Set modules
     *
     * @param ConcreteModule $modules
     * @return Activities
     */
    public function setModules(ConcreteModule $modules)
    {
        $this->modules = $modules;

        return $this;
    }

    /**
     * Get modules
     *
     * @return \Test\UserBundle\Entity\Modules 
     */
    public function getModules()
    {
        return $this->modules;
    }
}
