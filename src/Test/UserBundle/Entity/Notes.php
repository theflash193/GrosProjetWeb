<?php
// src/Test/UserBundle/Entity/Notes.php

namespace Test\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sym_notes")
 */
class Notes
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="baremeid", type="integer")
     */
    protected $baremeid;

    /**
     * @ORM\Column(name="userid", type="integer")
     */
    protected $userid;

    /**
     * @ORM\Column(name="note", type="integer")
     */
    protected $note;

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
     * Set baremeid
     *
     * @param integer $baremeid
     * @return Notes
     */
    public function setBaremeid($baremeid)
    {
        $this->baremeid = $baremeid;

        return $this;
    }

    /**
     * Get baremeid
     *
     * @return integer 
     */
    public function getBaremeid()
    {
        return $this->baremeid;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Notes
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return Notes
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
