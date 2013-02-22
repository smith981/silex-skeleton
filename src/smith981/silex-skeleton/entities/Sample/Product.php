<?php
// entities/Product.php

namespace Sample;
use Zend\Form\Annotation;

/**
 * @Entity @Table(name="products")
 **/
class Product
{
    /** 
     * @Annotation\Exclude
     * @Id @Column(type="integer") 
     * @GeneratedValue 
     */
    protected $id;

    /** 
     * @Annotation\Text
     * @Column(type="string") 
     */
    protected $name;



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
     * @return Product
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