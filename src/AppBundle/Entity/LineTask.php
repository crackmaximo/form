<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * 
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class LineTask{
	
/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
	
	/**
	 * @ORM\Column(type="string",nullable=true)
     *              
	 */
	protected $name;

    /**
     * @ORM\Column(type="string",nullable=true)
     *              
     */
    protected $apellido;
	
	/**
     * 
	 * @ORM\ManyToOne(targetEntity="Task", inversedBy="linetasks",cascade={"persist"})
	 * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     * @var type 
	 */
	protected $task;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="lineproduct",cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $products;
    


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
     * @return LineTask
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
     * Set task
     *
     * @param \AppBundle\Entity\Task $task
     * @return LineTask
     */
    public function setTask(\AppBundle\Entity\Task $task = null)
    {
        $this->task = $task;
        
        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return LineTask
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set products
     *
     * @param \AppBundle\Entity\Product $products
     * @return LineTask
     */
    public function setProducts(\AppBundle\Entity\Product $products = null)
    {
        
    
        $this->products = $products;
    
    }
    /**
     * Get products
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
