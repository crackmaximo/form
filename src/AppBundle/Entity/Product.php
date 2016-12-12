<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */

class Product{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $wearType;
	
	/**
	 * @ORM\OneToMany(targetEntity="LineTask", mappedBy="products", cascade={"persist", "remove"})
	 */
	protected $lineproduct;
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lineproduct = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set wearType
     *
     * @param string $wearType
     * @return Product
     */
    public function setWearType($wearType)
    {
        $this->wearType = $wearType;

        return $this;
    }

    /**
     * Get wearType
     *
     * @return string 
     */
    public function getWearType()
    {
        return $this->wearType;
    }
    /**
     * Set lineproduct
     *
     * @param \AppBundle\Entity\LineTask $lineproduct
     * @return Product
     */
    public function setLineproduct(\AppBundle\Entity\LineTask $lineproduct = null)
    {
        $this->lineproduct = $lineproduct;
        
        return $this;
    }
    /**
     * Add lineproduct
     *
     * @param \AppBundle\Entity\LineTask $lineproduct
     * @return Product
     */
    public function addLineproduct(\AppBundle\Entity\LineTask $lineproduct)
    {
        $this->lineproduct[] = $lineproduct;
        $lineproduct->setProducts($this);
        return $this;
    }

    /**
     * Remove lineproduct
     *
     * @param \AppBundle\Entity\LineTask $lineproduct
     */
    public function removeLineproduct(\AppBundle\Entity\LineTask $lineproduct)
    {
        $this->lineproduct->removeElement($lineproduct);
    }

    /**
     * Get lineproduct
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineproduct()
    {
        return $this->lineproduct;
    }
}
