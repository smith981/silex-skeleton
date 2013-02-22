<?php
// entities/Bug.php

namespace Sample;
use Zend\Form\Annotation;

/**
 * @Entity @Table(name="bugs")
 **/
class Bug
{
    /**
     * @Annotation\Exclude
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;
    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Column(type="string")
     **/
    protected $description;
    /**
     * @Annotation\Exclude
     * @Column(type="datetime")
     **/
    protected $created;
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Column(type="string")
     **/
    protected $status;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     **/
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     **/
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product")
     **/
    protected $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return Bug
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
     * Set created
     *
     * @param \DateTime $created
     * @return Bug
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Bug
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set engineer
     *
     * @param \User $engineer
     * @return Bug
     */
    public function setEngineer(User $engineer = null)
    {
        $this->engineer = $engineer;
    
        return $this;
    }

    /**
     * Get engineer
     *
     * @return \User 
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * Set reporter
     *
     * @param \User $reporter
     * @return Bug
     */
    public function setReporter(User $reporter = null)
    {
        $this->reporter = $reporter;
    
        return $this;
    }

    /**
     * Get reporter
     *
     * @return \User 
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * Add products
     *
     * @param \Product $products
     * @return Bug
     */
    public function addProduct(Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param \Product $products
     */
    public function removeProduct(Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}