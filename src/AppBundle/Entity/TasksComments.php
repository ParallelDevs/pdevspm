<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TasksComments
 *
 * @ORM\Table(name="tasks_comments", indexes={@ORM\Index(name="fk_tasks_comments_pople", columns={"created_by"}), @ORM\Index(name="fk_tasks_comments_tasks", columns={"tasks_id"}), @ORM\Index(name="fk_tasks_comments_status", columns={"tasks_status_id"}), @ORM\Index(name="fk_tasks_comments_priority", columns={"tasks_priority_id"})})
 * @ORM\Entity
 */
class TasksComments
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
     * @ORM\Column(name="worked_hours", type="float", precision=10, scale=0, nullable=true)
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
     * @var \AppBundle\Entity\Tasks
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_id", referencedColumnName="id")
     * })
     */
    private $tasks;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

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
     * @return TasksComments
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
     * @return TasksComments
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
     * @return TasksComments
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
     * @return TasksComments
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
     * @return TasksComments
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
     * Set tasks
     *
     * @param \AppBundle\Entity\Tasks $tasks
     * @return TasksComments
     */
    public function setTasks(\AppBundle\Entity\Tasks $tasks = null)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return \AppBundle\Entity\Tasks 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\Users $createdBy
     * @return TasksComments
     */
    public function setCreatedBy(\AppBundle\Entity\Users $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set tasksStatus
     *
     * @param \AppBundle\Entity\TasksStatus $tasksStatus
     * @return TasksComments
     */
    public function setTasksStatus(\AppBundle\Entity\TasksStatus $tasksStatus = null)
    {
        $this->tasksStatus = $tasksStatus;

        return $this;
    }

    /**
     * Get tasksStatus
     *
     * @return \AppBundle\Entity\TasksStatus 
     */
    public function getTasksStatus()
    {
        return $this->tasksStatus;
    }

    /**
     * Set tasksPriority
     *
     * @param \AppBundle\Entity\TasksPriority $tasksPriority
     * @return TasksComments
     */
    public function setTasksPriority(\AppBundle\Entity\TasksPriority $tasksPriority = null)
    {
        $this->tasksPriority = $tasksPriority;

        return $this;
    }

    /**
     * Get tasksPriority
     *
     * @return \AppBundle\Entity\TasksPriority 
     */
    public function getTasksPriority()
    {
        return $this->tasksPriority;
    }
}
