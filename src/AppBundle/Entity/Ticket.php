<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket.
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_ticket_user", columns={"user_id"}), @ORM\Index(name="fk_ticket_ticket_status", columns={"ticket_status_id"}), @ORM\Index(name="fk_ticket_ticket_type", columns={"ticket_type_id"}), @ORM\Index(name="fk_ticket_project", columns={"project_id"}), @ORM\Index(name="fk_ticket_department", columns={"department_id"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_email_ticket", type="integer", length=255, nullable=true)
     */
    private $idEmailTicket;

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
     * @var \AppBundle\Entity\TicketStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_status_id", referencedColumnName="id")
     * })
     */
    private $ticketStatus;

    /**
     * @var \AppBundle\Entity\TicketType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_type_id", referencedColumnName="id")
     * })
     */
    private $ticketType;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \AppBundle\Entity\Department
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Department")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private $department;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set setIdEmailTicket.
     *
     * @param int $idEmailTicket
     *
     * @return Ticket
     */
    public function setIdEmailTicket($idEmailTicket)
    {
        $this->idEmailTicket = $idEmailTicket;

        return $this;
    }

    /**
     * Get getIdEmailTicket.
     *
     * @return int
     */
    public function getIdEmailTicket()
    {
        return $this->idEmailTicket;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Ticket
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Ticket
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Ticket
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set ticketStatus.
     *
     * @param \AppBundle\Entity\TicketStatus $ticketStatus
     *
     * @return Ticket
     */
    public function setTicketStatus(\AppBundle\Entity\TicketStatus $ticketStatus = null)
    {
        $this->ticketStatus = $ticketStatus;

        return $this;
    }

    /**
     * Get ticketStatus.
     *
     * @return \AppBundle\Entity\TicketStatus
     */
    public function getTicketStatus()
    {
        return $this->ticketStatus;
    }

    /**
     * Set ticketType.
     *
     * @param \AppBundle\Entity\TicketType $ticketType
     *
     * @return Ticket
     */
    public function setTicketType(\AppBundle\Entity\TicketType $ticketType = null)
    {
        $this->ticketType = $ticketType;

        return $this;
    }

    /**
     * Get ticketType.
     *
     * @return \AppBundle\Entity\TicketType
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * Set user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Ticket
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set project.
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return Ticket
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project.
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set department.
     *
     * @param \AppBundle\Entity\Department $department
     *
     * @return Ticket
     */
    public function setDepartment(\AppBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department.
     *
     * @return \AppBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }
}
