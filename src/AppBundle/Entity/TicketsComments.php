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


}
