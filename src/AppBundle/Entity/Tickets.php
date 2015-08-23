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


}
