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
}
