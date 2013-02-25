<?php
// entities/User.php

namespace Sample;
use Zend\Form\Annotation;

/**
 * @Entity @Table(name="users")
 **/
class User
{
    /**
     * @Annotation\Exclude
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reportedBugs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->assignedBugs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return User
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
}
