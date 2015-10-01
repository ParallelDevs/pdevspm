<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskComment
 *
 * @ORM\Table(name="task_comment", indexes={@ORM\Index(name="fk_task_comment_user", columns={"created_by"}), @ORM\Index(name="fk_task_comment_task", columns={"task_id"}), @ORM\Index(name="fk_task_comment_status", columns={"task_status_id"}), @ORM\Index(name="fk_task_comment_priority", columns={"task_priority_id"}), @ORM\Index(name="fk_task_comment_label", columns={"task_label_id"}), @ORM\Index(name="fk_project_task_comment", columns={"project_id"})})
 * @ORM\Entity
 */
class TaskComment
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
     * @var \DateTime
     *
     * @ORM\Column(name="due_date", type="date", nullable=true)
     */
    private $dueDate;

    /**
     * @var float
     *
     * @ORM\Column(name="worked_hours", type="time", precision=10, scale=0, nullable=true)
     */
    private $workedHours;

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
     * @var integer
     *
     * @ORM\Column(name="progress", type="integer", nullable=true)
     */
    private $progress;

    /**
     * @var \AppBundle\Entity\Task
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     * })
     */
    private $task;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

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
     * @var \AppBundle\Entity\TaskPriority
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskLabel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_label_id", referencedColumnName="id")
     * })
     */
    private $taskLabel;

    /**
     * @var \AppBundle\Entity\TaskPriority
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_type_id", referencedColumnName="id")
     * })
     */
    private $taskType;

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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinTable(name="task_comment_assignedTo_team",
     *      joinColumns={@ORM\JoinColumn(name="task_comment_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     *      )
     */
    private $taskAssignedTo;



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
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return TaskComment
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
     * Set workedHours
     *
     * @param float $workedHours
     * @return TaskComment
     */
    public function setWorkedHours($workedHours)
    {
        $this->workedHours = $workedHours;

        return $this;
    }

    /**
     * Get workedHours
     *
     * @return float 
     */
    public function getWorkedHours()
    {
        return $this->workedHours;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return TaskComment
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
     * @return TaskComment
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
     * Set progress
     *
     * @param integer $progress
     * @return TaskComment
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
     * Set task
     *
     * @param \AppBundle\Entity\Task $task
     * @return TaskComment
     */
    public function setTask(\AppBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return TaskComment
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

    /**
     * Set taskStatus
     *
     * @param \AppBundle\Entity\TaskStatus $taskStatus
     * @return TaskComment
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
     * @return TaskComment
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
     * Set taskPriority
     *
     * @param \AppBundle\Entity\TaskLabel $taskLabel
     * @return TaskComment
     */
    public function setTaskLabel(\AppBundle\Entity\TaskLabel $taskLabel = null)
    {
        $this->taskLabel = $taskLabel;

        return $this;
    }

    /**
     * Get taskPriority
     *
     * @return \AppBundle\Entity\TaskLabel
     */
    public function getTaskLabel()
    {
        return $this->taskLabel;
    }

    /**
     * Set taskPriority
     *
     * @param \AppBundle\Entity\TaskType $taskType
     * @return TaskComment
     */
    public function setTaskType(\AppBundle\Entity\TaskType $taskType = null)
    {
        $this->taskType = $taskType;

        return $this;
    }

    /**
     * Get taskPriority
     *
     * @return \AppBundle\Entity\TaskType
     */
    public function getTaskType()
    {
        return $this->taskType;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return TaskComment
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get taskPriority
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }


    /**
     * Set team
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $taskAssignedTo
     * @return TaskComment
     */
    public function setTaskAssignedTo(\Doctrine\Common\Collections\ArrayCollection $taskAssignedTo)
    {
        $this->taskAssignedTo = $taskAssignedTo;

        return $this;
    }

    /**
     * Get team
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTaskAssignedTo()
    {
        return $this->taskAssignedTo;
    }
}
