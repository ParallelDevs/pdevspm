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
     * @return UserReports
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
     * Set displayOnHome
     *
     * @param boolean $displayOnHome
     * @return UserReports
     */
    public function setDisplayOnHome($displayOnHome)
    {
        $this->displayOnHome = $displayOnHome;

        return $this;
    }

    /**
     * Get displayOnHome
     *
     * @return boolean 
     */
    public function getDisplayOnHome()
    {
        return $this->displayOnHome;
    }

    /**
     * Set projectsId
     *
     * @param string $projectsId
     * @return UserReports
     */
    public function setProjectsId($projectsId)
    {
        $this->projectsId = $projectsId;

        return $this;
    }

    /**
     * Get projectsId
     *
     * @return string 
     */
    public function getProjectsId()
    {
        return $this->projectsId;
    }

    /**
     * Set projectsTypeId
     *
     * @param string $projectsTypeId
     * @return UserReports
     */
    public function setProjectsTypeId($projectsTypeId)
    {
        $this->projectsTypeId = $projectsTypeId;

        return $this;
    }

    /**
     * Get projectsTypeId
     *
     * @return string 
     */
    public function getProjectsTypeId()
    {
        return $this->projectsTypeId;
    }

    /**
     * Set projectsStatusId
     *
     * @param string $projectsStatusId
     * @return UserReports
     */
    public function setProjectsStatusId($projectsStatusId)
    {
        $this->projectsStatusId = $projectsStatusId;

        return $this;
    }

    /**
     * Get projectsStatusId
     *
     * @return string 
     */
    public function getProjectsStatusId()
    {
        return $this->projectsStatusId;
    }

    /**
     * Set assignedTo
     *
     * @param string $assignedTo
     * @return UserReports
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
     * Set tasksStatusId
     *
     * @param string $tasksStatusId
     * @return UserReports
     */
    public function setTasksStatusId($tasksStatusId)
    {
        $this->tasksStatusId = $tasksStatusId;

        return $this;
    }

    /**
     * Get tasksStatusId
     *
     * @return string 
     */
    public function getTasksStatusId()
    {
        return $this->tasksStatusId;
    }

    /**
     * Set tasksTypeId
     *
     * @param string $tasksTypeId
     * @return UserReports
     */
    public function setTasksTypeId($tasksTypeId)
    {
        $this->tasksTypeId = $tasksTypeId;

        return $this;
    }

    /**
     * Get tasksTypeId
     *
     * @return string 
     */
    public function getTasksTypeId()
    {
        return $this->tasksTypeId;
    }

    /**
     * Set tasksLabelId
     *
     * @param string $tasksLabelId
     * @return UserReports
     */
    public function setTasksLabelId($tasksLabelId)
    {
        $this->tasksLabelId = $tasksLabelId;

        return $this;
    }

    /**
     * Get tasksLabelId
     *
     * @return string 
     */
    public function getTasksLabelId()
    {
        return $this->tasksLabelId;
    }

    /**
     * Set dueDateFrom
     *
     * @param \DateTime $dueDateFrom
     * @return UserReports
     */
    public function setDueDateFrom($dueDateFrom)
    {
        $this->dueDateFrom = $dueDateFrom;

        return $this;
    }

    /**
     * Get dueDateFrom
     *
     * @return \DateTime 
     */
    public function getDueDateFrom()
    {
        return $this->dueDateFrom;
    }

    /**
     * Set dueDateTo
     *
     * @param \DateTime $dueDateTo
     * @return UserReports
     */
    public function setDueDateTo($dueDateTo)
    {
        $this->dueDateTo = $dueDateTo;

        return $this;
    }

    /**
     * Get dueDateTo
     *
     * @return \DateTime 
     */
    public function getDueDateTo()
    {
        return $this->dueDateTo;
    }

    /**
     * Set createdFrom
     *
     * @param \DateTime $createdFrom
     * @return UserReports
     */
    public function setCreatedFrom($createdFrom)
    {
        $this->createdFrom = $createdFrom;

        return $this;
    }

    /**
     * Get createdFrom
     *
     * @return \DateTime 
     */
    public function getCreatedFrom()
    {
        return $this->createdFrom;
    }

    /**
     * Set createdTo
     *
     * @param \DateTime $createdTo
     * @return UserReports
     */
    public function setCreatedTo($createdTo)
    {
        $this->createdTo = $createdTo;

        return $this;
    }

    /**
     * Get createdTo
     *
     * @return \DateTime 
     */
    public function getCreatedTo()
    {
        return $this->createdTo;
    }

    /**
     * Set closedFrom
     *
     * @param \DateTime $closedFrom
     * @return UserReports
     */
    public function setClosedFrom($closedFrom)
    {
        $this->closedFrom = $closedFrom;

        return $this;
    }

    /**
     * Get closedFrom
     *
     * @return \DateTime 
     */
    public function getClosedFrom()
    {
        return $this->closedFrom;
    }

    /**
     * Set closedTo
     *
     * @param \DateTime $closedTo
     * @return UserReports
     */
    public function setClosedTo($closedTo)
    {
        $this->closedTo = $closedTo;

        return $this;
    }

    /**
     * Get closedTo
     *
     * @return \DateTime 
     */
    public function getClosedTo()
    {
        return $this->closedTo;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return UserReports
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set users
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Users $users
     * @return UserReports
     */
    public function setUsers(\ParallelDevs\ProjectManagementBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
