<?php
// src/Test/UserBundle/Entity/Baremes.php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sym_baremes")
 */
class Baremes
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="activityid", type="integer")
     */
    protected $activityid;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

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
     * Set activityid
     *
     * @param integer $activityid
     * @return Baremes
     */
    public function setActivityid($activityid)
    {
        $this->activityid = $activityid;

        return $this;
    }

    /**
     * Get activityid
     *
     * @return integer 
     */
    public function getActivityid()
    {
        return $this->activityid;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Baremes
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
}
