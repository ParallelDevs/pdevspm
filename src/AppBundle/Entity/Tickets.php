<?php

namespace AppBundle\Entity;

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
     * @var \AppBundle\Entity\TicketsStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_status_id", referencedColumnName="id")
     * })
     */
    private $ticketsStatus;

    /**
     * @var \AppBundle\Entity\TicketsTypes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketsTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_types_id", referencedColumnName="id")
     * })
     */
    private $ticketsTypes;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * @var \AppBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

    /**
     * @var \AppBundle\Entity\Departments
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Departments")
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
     * @param \AppBundle\Entity\TicketsStatus $ticketsStatus
     * @return Tickets
     */
    public function setTicketsStatus(\AppBundle\Entity\TicketsStatus $ticketsStatus = null)
    {
        $this->ticketsStatus = $ticketsStatus;

        return $this;
    }

    /**
     * Get ticketsStatus
     *
     * @return \AppBundle\Entity\TicketsStatus 
     */
    public function getTicketsStatus()
    {
        return $this->ticketsStatus;
    }

    /**
     * Set ticketsTypes
     *
     * @param \AppBundle\Entity\TicketsTypes $ticketsTypes
     * @return Tickets
     */
    public function setTicketsTypes(\AppBundle\Entity\TicketsTypes $ticketsTypes = null)
    {
        $this->ticketsTypes = $ticketsTypes;

        return $this;
    }

    /**
     * Get ticketsTypes
     *
     * @return \AppBundle\Entity\TicketsTypes 
     */
    public function getTicketsTypes()
    {
        return $this->ticketsTypes;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\Users $users
     * @return Tickets
     */
    public function setUsers(\AppBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set projects
     *
     * @param \AppBundle\Entity\Projects $projects
     * @return Tickets
     */
    public function setProjects(\AppBundle\Entity\Projects $projects = null)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return \AppBundle\Entity\Projects 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set departments
     *
     * @param \AppBundle\Entity\Departments $departments
     * @return Tickets
     */
    public function setDepartments(\AppBundle\Entity\Departments $departments = null)
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * Get departments
     *
     * @return \AppBundle\Entity\Departments 
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}
