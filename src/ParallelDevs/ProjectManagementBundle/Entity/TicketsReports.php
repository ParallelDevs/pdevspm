<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsReports
 *
 * @ORM\Table(name="tickets_reports", indexes={@ORM\Index(name="users_id", columns={"users_id"})})
 * @ORM\Entity
 */
class TicketsReports
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
     * @var boolean
     *
     * @ORM\Column(name="display_on_home", type="boolean", nullable=true)
     */
    private $displayOnHome;

    /**
     * @var string
     *
     * @ORM\Column(name="projects_id", type="text", nullable=true)
     */
    private $projectsId;

    /**
     * @var string
     *
     * @ORM\Column(name="projects_type_id", type="text", nullable=true)
     */
    private $projectsTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="projects_status_id", type="text", nullable=true)
     */
    private $projectsStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="departments_id", type="text", nullable=true)
     */
    private $departmentsId;

    /**
     * @var string
     *
     * @ORM\Column(name="tickets_types_id", type="text", nullable=true)
     */
    private $ticketsTypesId;

    /**
     * @var string
     *
     * @ORM\Column(name="tickets_status_id", type="text", nullable=true)
     */
    private $ticketsStatusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;


}
