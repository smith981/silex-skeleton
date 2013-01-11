<?php
// entities/User.php
/**
 * @Entity @Table(name="users")
 **/
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[]
     **/
    protected $reportedBugs = null;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[]
     **/
    protected $assignedBugs = null;

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

    /**
     * Add reportedBugs
     *
     * @param \Bug $reportedBugs
     * @return User
     */
    public function addReportedBug(\Bug $reportedBugs)
    {
        $this->reportedBugs[] = $reportedBugs;
    
        return $this;
    }

    /**
     * Remove reportedBugs
     *
     * @param \Bug $reportedBugs
     */
    public function removeReportedBug(\Bug $reportedBugs)
    {
        $this->reportedBugs->removeElement($reportedBugs);
    }

    /**
     * Get reportedBugs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * Add assignedBugs
     *
     * @param \Bug $assignedBugs
     * @return User
     */
    public function addAssignedBug(\Bug $assignedBugs)
    {
        $this->assignedBugs[] = $assignedBugs;
    
        return $this;
    }

    /**
     * Remove assignedBugs
     *
     * @param \Bug $assignedBugs
     */
    public function removeAssignedBug(\Bug $assignedBugs)
    {
        $this->assignedBugs->removeElement($assignedBugs);
    }

    /**
     * Get assignedBugs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }
}