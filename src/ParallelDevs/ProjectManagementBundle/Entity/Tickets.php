<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tickets
 *
 * @ORM\Table(name="tickets", indexes={@ORM\Index(name="fk_tickets_users", columns={"users_id"}), @ORM\Index(name="fk_tickets_tickets_status", columns={"tickets_status_id"}), @ORM\Index(name="fk_tickets_tickets_types", columns={"tickets_types_id"}), @ORM\Index(name="fk_tickets_projects", columns={"projects_id"}), @ORM\Index(name="fk_tickets_departments", columns={"departments_id"})})
 * @ORM\Entity
 */
class Tickets
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TicketsStatus
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TicketsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_status_id", referencedColumnName="id")
     * })
     */
    private $ticketsStatus;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TicketsTypes
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TicketsTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_types_id", referencedColumnName="id")
     * })
     */
    private $ticketsTypes;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Departments
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Departments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departments_id", referencedColumnName="id")
     * })
     */
    private $departments;



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
     * @return Tickets
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
     * Set description
     *
     * @param string $description
     * @return Tickets
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Tickets
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set ticketsStatus
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TicketsStatus $ticketsStatus
     * @return Tickets
     */
    public function setTicketsStatus(\ParallelDevs\ProjectManagementBundle\Entity\TicketsStatus $ticketsStatus = null)
    {
        $this->ticketsStatus = $ticketsStatus;

        return $this;
    }

    /**
     * Get ticketsStatus
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TicketsStatus 
     */
    public function getTicketsStatus()
    {
        return $this->ticketsStatus;
    }

    /**
     * Set ticketsTypes
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TicketsTypes $ticketsTypes
     * @return Tickets
     */
    public function setTicketsTypes(\ParallelDevs\ProjectManagementBundle\Entity\TicketsTypes $ticketsTypes = null)
    {
        $this->ticketsTypes = $ticketsTypes;

        return $this;
    }

    /**
     * Get ticketsTypes
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TicketsTypes 
     */
    public function getTicketsTypes()
    {
        return $this->ticketsTypes;
    }

    /**
     * Set users
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Users $users
     * @return Tickets
     */
    public function setUsers(\ParallelDevs\ProjectManagementBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set projects
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Projects $projects
     * @return Tickets
     */
    public function setProjects(\ParallelDevs\ProjectManagementBundle\Entity\Projects $projects = null)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Projects 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set departments
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Departments $departments
     * @return Tickets
     */
    public function setDepartments(\ParallelDevs\ProjectManagementBundle\Entity\Departments $departments = null)
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * Get departments
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Departments 
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}
