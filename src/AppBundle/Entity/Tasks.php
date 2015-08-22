<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tasks
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_tasks_projects", columns={"projects_id"}), @ORM\Index(name="fk_tasks_task_status", columns={"tasks_status_id"}), @ORM\Index(name="fk_tasks_task_type", columns={"tasks_type_id"}), @ORM\Index(name="fk_tasks_task_label", columns={"tasks_label_id"}), @ORM\Index(name="fk_tasks_projects_phases", columns={"projects_phases_id"}), @ORM\Index(name="fk_tasks_pople", columns={"created_by"}), @ORM\Index(name="fk_tasks_tasks_groups", columns={"tasks_groups_id"}), @ORM\Index(name="fk_tasks_versions", columns={"versions_id"}), @ORM\Index(name="fk_tasks_tasks_priority", columns={"tasks_priority_id"}), @ORM\Index(name="fk_tasks_tickets", columns={"tickets_id"})})
 * @ORM\Entity
 */
class Tasks
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
     * @var string
     *
     * @ORM\Column(name="assigned_to", type="string", length=255, nullable=true)
     */
    private $assignedTo;

    /**
     * @var float
     *
     * @ORM\Column(name="estimated_time", type="float", precision=10, scale=0, nullable=true)
     */
    private $estimatedTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="due_date", type="date", nullable=true)
     */
    private $dueDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closed_date", type="date", nullable=true)
     */
    private $closedDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="discussion_id", type="integer", nullable=true)
     */
    private $discussionId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="progress", type="integer", nullable=true)
     */
    private $progress;

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
     * @var \AppBundle\Entity\Tickets
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tickets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_id", referencedColumnName="id")
     * })
     */
    private $tickets;

    /**
     * @var \AppBundle\Entity\TasksStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TasksStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_status_id", referencedColumnName="id")
     * })
     */
    private $tasksStatus;

    /**
     * @var \AppBundle\Entity\TasksPriority
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TasksPriority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_priority_id", referencedColumnName="id")
     * })
     */
    private $tasksPriority;

    /**
     * @var \AppBundle\Entity\TasksTypes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TasksTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_type_id", referencedColumnName="id")
     * })
     */
    private $tasksType;

    /**
     * @var \AppBundle\Entity\TasksLabels
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TasksLabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_label_id", referencedColumnName="id")
     * })
     */
    private $tasksLabel;

    /**
     * @var \AppBundle\Entity\TasksGroups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TasksGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_groups_id", referencedColumnName="id")
     * })
     */
    private $tasksGroups;

    /**
     * @var \AppBundle\Entity\ProjectsPhases
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectsPhases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_phases_id", referencedColumnName="id")
     * })
     */
    private $projectsPhases;

    /**
     * @var \AppBundle\Entity\Versions
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Versions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="versions_id", referencedColumnName="id")
     * })
     */
    private $versions;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;


}
