<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsComments
 *
 * @ORM\Table(name="tickets_comments", indexes={@ORM\Index(name="fk_tickets_comments_tickets", columns={"tickets_id"}), @ORM\Index(name="fk_tickets_comments_users", columns={"users_id"}), @ORM\Index(name="k_tickets_comments_status", columns={"tickets_status_id"})})
 * @ORM\Entity
 */
class TicketsComments
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
     * @var \AppBundle\Entity\Tickets
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tickets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_id", referencedColumnName="id")
     * })
     */
    private $tickets;

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
     * @var \AppBundle\Entity\TicketsStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TicketsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_status_id", referencedColumnName="id")
     * })
     */
    private $ticketsStatus;



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
     * @return TicketsComments
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
     * @return TicketsComments
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
     * Set tickets
     *
     * @param \AppBundle\Entity\Tickets $tickets
     * @return TicketsComments
     */
    public function setTickets(\AppBundle\Entity\Tickets $tickets = null)
    {
        $this->tickets = $tickets;

        return $this;
    }

    /**
     * Get tickets
     *
     * @return \AppBundle\Entity\Tickets 
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\Users $users
     * @return TicketsComments
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
     * Set ticketsStatus
     *
     * @param \AppBundle\Entity\TicketsStatus $ticketsStatus
     * @return TicketsComments
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
}
