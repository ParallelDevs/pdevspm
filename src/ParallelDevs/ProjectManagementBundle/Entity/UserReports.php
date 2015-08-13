<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserReports
 *
 * @ORM\Table(name="user_reports", indexes={@ORM\Index(name="fk_user_reports_users", columns={"users_id"})})
 * @ORM\Entity
 */
class UserReports
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
     * @ORM\Column(name="assigned_to", type="text", nullable=true)
     */
    private $assignedTo;

    /**
     * @var string
     *
     * @ORM\Column(name="tasks_status_id", type="text", nullable=true)
     */
    private $tasksStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="tasks_type_id", type="text", nullable=true)
     */
    private $tasksTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="tasks_label_id", type="text", nullable=true)
     */
    private $tasksLabelId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="due_date_from", type="date", nullable=true)
     */
    private $dueDateFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="due_date_to", type="date", nullable=true)
     */
    private $dueDateTo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_from", type="date", nullable=true)
     */
    private $createdFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_to", type="date", nullable=true)
     */
    private $createdTo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closed_from", type="date", nullable=true)
     */
    private $closedFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closed_to", type="date", nullable=true)
     */
    private $closedTo;

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
