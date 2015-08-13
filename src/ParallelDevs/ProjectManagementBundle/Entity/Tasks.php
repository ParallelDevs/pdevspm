<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

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
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Tickets
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Tickets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tickets_id", referencedColumnName="id")
     * })
     */
    private $tickets;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksStatus
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_status_id", referencedColumnName="id")
     * })
     */
    private $tasksStatus;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksPriority
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksPriority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_priority_id", referencedColumnName="id")
     * })
     */
    private $tasksPriority;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksTypes
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_type_id", referencedColumnName="id")
     * })
     */
    private $tasksType;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksLabels
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksLabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_label_id", referencedColumnName="id")
     * })
     */
    private $tasksLabel;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksGroups
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_groups_id", referencedColumnName="id")
     * })
     */
    private $tasksGroups;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\ProjectsPhases
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\ProjectsPhases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_phases_id", referencedColumnName="id")
     * })
     */
    private $projectsPhases;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Versions
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Versions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="versions_id", referencedColumnName="id")
     * })
     */
    private $versions;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;



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
     * @return Tasks
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
     * @return Tasks
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
     * Set assignedTo
     *
     * @param string $assignedTo
     * @return Tasks
     */
    public function setAssignedTo($assignedTo)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * Get assignedTo
     *
     * @return string 
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * Set estimatedTime
     *
     * @param float $estimatedTime
     * @return Tasks
     */
    public function setEstimatedTime($estimatedTime)
    {
        $this->estimatedTime = $estimatedTime;

        return $this;
    }

    /**
     * Get estimatedTime
     *
     * @return float 
     */
    public function getEstimatedTime()
    {
        return $this->estimatedTime;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Tasks
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Tasks
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
     * Set closedDate
     *
     * @param \DateTime $closedDate
     * @return Tasks
     */
    public function setClosedDate($closedDate)
    {
        $this->closedDate = $closedDate;

        return $this;
    }

    /**
     * Get closedDate
     *
     * @return \DateTime 
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * Set discussionId
     *
     * @param integer $discussionId
     * @return Tasks
     */
    public function setDiscussionId($discussionId)
    {
        $this->discussionId = $discussionId;

        return $this;
    }

    /**
     * Get discussionId
     *
     * @return integer 
     */
    public function getDiscussionId()
    {
        return $this->discussionId;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Tasks
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set progress
     *
     * @param integer $progress
     * @return Tasks
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get progress
     *
     * @return integer 
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set projects
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Projects $projects
     * @return Tasks
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
     * Set tickets
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Tickets $tickets
     * @return Tasks
     */
    public function setTickets(\ParallelDevs\ProjectManagementBundle\Entity\Tickets $tickets = null)
    {
        $this->tickets = $tickets;

        return $this;
    }

    /**
     * Get tickets
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Tickets 
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Set tasksStatus
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TasksStatus $tasksStatus
     * @return Tasks
     */
    public function setTasksStatus(\ParallelDevs\ProjectManagementBundle\Entity\TasksStatus $tasksStatus = null)
    {
        $this->tasksStatus = $tasksStatus;

        return $this;
    }

    /**
     * Get tasksStatus
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TasksStatus 
     */
    public function getTasksStatus()
    {
        return $this->tasksStatus;
    }

    /**
     * Set tasksPriority
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TasksPriority $tasksPriority
     * @return Tasks
     */
    public function setTasksPriority(\ParallelDevs\ProjectManagementBundle\Entity\TasksPriority $tasksPriority = null)
    {
        $this->tasksPriority = $tasksPriority;

        return $this;
    }

    /**
     * Get tasksPriority
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TasksPriority 
     */
    public function getTasksPriority()
    {
        return $this->tasksPriority;
    }

    /**
     * Set tasksType
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TasksTypes $tasksType
     * @return Tasks
     */
    public function setTasksType(\ParallelDevs\ProjectManagementBundle\Entity\TasksTypes $tasksType = null)
    {
        $this->tasksType = $tasksType;

        return $this;
    }

    /**
     * Get tasksType
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TasksTypes 
     */
    public function getTasksType()
    {
        return $this->tasksType;
    }

    /**
     * Set tasksLabel
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TasksLabels $tasksLabel
     * @return Tasks
     */
    public function setTasksLabel(\ParallelDevs\ProjectManagementBundle\Entity\TasksLabels $tasksLabel = null)
    {
        $this->tasksLabel = $tasksLabel;

        return $this;
    }

    /**
     * Get tasksLabel
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TasksLabels 
     */
    public function getTasksLabel()
    {
        return $this->tasksLabel;
    }

    /**
     * Set tasksGroups
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\TasksGroups $tasksGroups
     * @return Tasks
     */
    public function setTasksGroups(\ParallelDevs\ProjectManagementBundle\Entity\TasksGroups $tasksGroups = null)
    {
        $this->tasksGroups = $tasksGroups;

        return $this;
    }

    /**
     * Get tasksGroups
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\TasksGroups 
     */
    public function getTasksGroups()
    {
        return $this->tasksGroups;
    }

    /**
     * Set projectsPhases
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\ProjectsPhases $projectsPhases
     * @return Tasks
     */
    public function setProjectsPhases(\ParallelDevs\ProjectManagementBundle\Entity\ProjectsPhases $projectsPhases = null)
    {
        $this->projectsPhases = $projectsPhases;

        return $this;
    }

    /**
     * Get projectsPhases
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\ProjectsPhases 
     */
    public function getProjectsPhases()
    {
        return $this->projectsPhases;
    }

    /**
     * Set versions
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Versions $versions
     * @return Tasks
     */
    public function setVersions(\ParallelDevs\ProjectManagementBundle\Entity\Versions $versions = null)
    {
        $this->versions = $versions;

        return $this;
    }

    /**
     * Get versions
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Versions 
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * Set createdBy
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Users $createdBy
     * @return Tasks
     */
    public function setCreatedBy(\ParallelDevs\ProjectManagementBundle\Entity\Users $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
