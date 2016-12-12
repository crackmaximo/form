<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * 
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class Task{
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="LineTask", mappedBy="task", cascade={"persist"})
     */
    protected $linetasks;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->linetasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Task
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
     * Add linetasks
     *
     * @param \AppBundle\Entity\LineTask $linetasks
     * @return Task
     */
    public function addLinetask(\AppBundle\Entity\LineTask $linetasks)
    {
        $this->linetasks[] = $linetasks;
        $linetasks->setTask($this);
        return $this;
    }

    /**
     * Remove linetasks
     *
     * @param \AppBundle\Entity\LineTask $linetasks
     */
    public function removeLinetask(\AppBundle\Entity\LineTask $linetasks)
    {
        $this->linetasks->removeElement($linetasks);
    }

    /**
     * Get linetasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLinetasks()
    {
        return $this->linetasks;
    }
}
