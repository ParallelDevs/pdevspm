<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 *
 * @ORM\Table(name="task", indexes={@ORM\Index(name="fk_task_project", columns={"project_id"}), @ORM\Index(name="fk_task_task_status", columns={"task_status_id"}), @ORM\Index(name="fk_task_task_type", columns={"task_type_id"}), @ORM\Index(name="fk_task_task_label", columns={"task_label_id"}), @ORM\Index(name="fk_task_project_phase", columns={"project_phase_id"}), @ORM\Index(name="fk_task_created_by", columns={"created_by"}), @ORM\Index(name="fk_task_task_group", columns={"task_group_id"}), @ORM\Index(name="fk_task_versions", columns={"versions_id"}), @ORM\Index(name="fk_task_task_priority", columns={"task_priority_id"}), @ORM\Index(name="fk_task_ticket", columns={"ticket_id"})})
 * @ORM\Entity
 */
class Task
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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinTable(name="task_assigned_to_user",
     *      joinColumns={@ORM\JoinColumn(name="task_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     *      )
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
     * @var string
     *
     * @ORM\Column(name="progress", type="string", nullable=true)
     */
    private $progress;

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
     * @var \AppBundle\Entity\Ticket
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     * })
     */
    private $ticket;

    /**
     * @var \AppBundle\Entity\TaskStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_status_id", referencedColumnName="id")
     * })
     */
    private $taskStatus;

    /**
     * @var \AppBundle\Entity\TaskPriority
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskPriority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_priority_id", referencedColumnName="id")
     * })
     */
    private $taskPriority;

    /**
     * @var \AppBundle\Entity\TaskType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_type_id", referencedColumnName="id")
     * })
     */
    private $taskType;

    /**
     * @var \AppBundle\Entity\TaskLabel
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskLabel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_label_id", referencedColumnName="id")
     * })
     */
    private $taskLabel;

    /**
     * @var \AppBundle\Entity\TaskGroup
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_group_id", referencedColumnName="id")
     * })
     */
    private $taskGroup;

    /**
     * @var \AppBundle\Entity\ProjectPhase
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectPhase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_phase_id", referencedColumnName="id")
     * })
     */
    private $projectPhase;

    /**
     * @var \AppBundle\Entity\Version
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Version")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="versions_id", referencedColumnName="id")
     * })
     */
    private $versions;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    public function __construct()
    {
        $this->assignedTo = new ArrayCollection();
    }

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
     * @return Task
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
     * @return Task
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
     * @param \Doctrine\Common\Collections\ArrayCollection $assignedTo
     * @return Task
     */
    public function setAssignedTo(\Doctrine\Common\Collections\ArrayCollection $assignedTo)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * Get assignedTo
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * Set estimatedTime
     *
     * @param float $estimatedTime
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return Task
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set ticket
     *
     * @param \AppBundle\Entity\Ticket $ticket
     * @return Task
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
     * Set taskStatus
     *
     * @param \AppBundle\Entity\TaskStatus $taskStatus
     * @return Task
     */
    public function setTaskStatus(\AppBundle\Entity\TaskStatus $taskStatus = null)
    {
        $this->taskStatus = $taskStatus;

        return $this;
    }

    /**
     * Get taskStatus
     *
     * @return \AppBundle\Entity\TaskStatus
     */
    public function getTaskStatus()
    {
        return $this->taskStatus;
    }

    /**
     * Set taskPriority
     *
     * @param \AppBundle\Entity\TaskPriority $taskPriority
     * @return Task
     */
    public function setTaskPriority(\AppBundle\Entity\TaskPriority $taskPriority = null)
    {
        $this->taskPriority = $taskPriority;

        return $this;
    }

    /**
     * Get taskPriority
     *
     * @return \AppBundle\Entity\TaskPriority
     */
    public function getTaskPriority()
    {
        return $this->taskPriority;
    }

    /**
     * Set taskType
     *
     * @param \AppBundle\Entity\TaskType $taskType
     * @return Task
     */
    public function setTaskType(\AppBundle\Entity\TaskType $taskType = null)
    {
        $this->taskType = $taskType;

        return $this;
    }

    /**
     * Get taskType
     *
     * @return \AppBundle\Entity\TaskType
     */
    public function getTaskType()
    {
        return $this->taskType;
    }

    /**
     * Set taskLabel
     *
     * @param \AppBundle\Entity\TaskLabel $taskLabel
     * @return Task
     */
    public function setTaskLabel(\AppBundle\Entity\TaskLabel $taskLabel = null)
    {
        $this->taskLabel = $taskLabel;

        return $this;
    }

    /**
     * Get taskLabel
     *
     * @return \AppBundle\Entity\TaskLabel
     */
    public function getTaskLabel()
    {
        return $this->taskLabel;
    }

    /**
     * Set taskGroup
     *
     * @param \AppBundle\Entity\TaskGroup $taskGroup
     * @return Task
     */
    public function setTaskGroup(\AppBundle\Entity\TaskGroup $taskGroup = null)
    {
        $this->taskGroup = $taskGroup;

        return $this;
    }

    /**
     * Get taskGroup
     *
     * @return \AppBundle\Entity\TaskGroup
     */
    public function getTaskGroup()
    {
        return $this->taskGroup;
    }

    /**
     * Set projectPhase
     *
     * @param \AppBundle\Entity\ProjectPhase $projectPhase
     * @return Task
     */
    public function setProjectPhase(\AppBundle\Entity\ProjectPhase $projectPhase = null)
    {
        $this->projectPhase = $projectPhase;

        return $this;
    }

    /**
     * Get projectPhase
     *
     * @return \AppBundle\Entity\ProjectPhase
     */
    public function getProjectPhase()
    {
        return $this->projectPhase;
    }

    /**
     * Set versions
     *
     * @param \AppBundle\Entity\Version $versions
     * @return Task
     */
    public function setVersion(\AppBundle\Entity\Version $versions = null)
    {
        $this->versions = $versions;

        return $this;
    }

    /**
     * Get versions
     *
     * @return \AppBundle\Entity\Version 
     */
    public function getVersion()
    {
        return $this->versions;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return Task
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
