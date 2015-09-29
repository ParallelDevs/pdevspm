<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketComment
 *
 * @ORM\Table(name="ticket_comment", indexes={@ORM\Index(name="fk_ticket_comment_ticket", columns={"ticket_id"}), @ORM\Index(name="fk_ticket_comment_user", columns={"user_id"}), @ORM\Index(name="fk_ticket_comment_status", columns={"ticket_status_id"}), @ORM\Index(name="fk_ticket_department_id", columns={"department_id"}), @ORM\Index(name="fk_ticket_comment_type_id", columns={"ticket_type_id"}), @ORM\Index(name="fk_ticket_project_id", columns={"project_id"})})
 * @ORM\Entity
 */
class TicketComment
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
     * @var \AppBundle\Entity\Ticket
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     * })
     */
    private $ticket;

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
     * @var \AppBundle\Entity\TicketStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_status_id", referencedColumnName="id")
     * })
     */
    private $ticketStatus;

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
     * @var \AppBundle\Entity\TicketType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_type_id", referencedColumnName="id")
     * })
     */
    private $ticketType;

    /**
     * @var \AppBundle\Entity\Ticket
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

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
     * @return TicketComment
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
     * @return TicketComment
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
     * Set ticket
     *
     * @param \AppBundle\Entity\Ticket $ticket
     * @return TicketComment
     */
    public function setTicket(\AppBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \AppBundle\Entity\Ticket 
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return TicketComment
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set ticketStatus
     *
     * @param \AppBundle\Entity\TicketStatus $ticketStatus
     * @return TicketComment
     */
    public function setTicketStatus(\AppBundle\Entity\TicketStatus $ticketStatus = null)
    {
        $this->ticketStatus = $ticketStatus;

        return $this;
    }

    /**
     * Get ticketStatus
     *
     * @return \AppBundle\Entity\TicketStatus
     */
    public function getTicketStatus()
    {
        return $this->ticketStatus;
    }

    /**
     * Set department
     *
     * @param \AppBundle\Entity\Department $department
     * @return TicketComment
     */
    public function setDepartment(\AppBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get ticketStatus
     *
     * @return \AppBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set ticketType
     *
     * @param \AppBundle\Entity\TicketType $ticketType
     * @return TicketComment
     */
    public function setTicketType(\AppBundle\Entity\TicketType $ticketType = null)
    {
        $this->ticketType = $ticketType;

        return $this;
    }

    /**
     * Get ticketStatus
     *
     * @return \AppBundle\Entity\TicketStatus
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return TicketComment
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get ticketStatus
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
