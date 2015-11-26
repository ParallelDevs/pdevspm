<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProjectsReport.
 *
 * @ORM\Table(name="project_report", indexes={@ORM\Index(name="fk_project_report_created_by", columns={"created_by"}), @ORM\Index(name="fk_project_report_user", columns={"user_id"})})
 * @ORM\Entity
 */
class ProjectReport
{
    /**
     * @var int
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
     * @var bool
     *
     * @ORM\Column(name="display_on_home", type="boolean", nullable=true)
     */
    private $displayOnHome;

    /**
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinTable(name="project_report_project",
     *      joinColumns={@ORM\JoinColumn(name="project_report_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $projects;

    /**
     * @var \AppBundle\Entity\ProjectType
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ProjectType")
     * @ORM\JoinTable(name="project_report_project_type",
     *      joinColumns={@ORM\JoinColumn(name="project_report_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="project_type_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $projectTypes;

    /**
     * @var \AppBundle\Entity\ProjectStatus
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ProjectStatus")
     * @ORM\JoinTable(name="project_report_project_status",
     *      joinColumns={@ORM\JoinColumn(name="project_report_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="project_status_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $projectStatus;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var bool
     *
     * @ORM\Column(name="display_in_menu", type="boolean", nullable=true)
     */
    private $displayInMenu;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible_on_home", type="boolean", nullable=true)
     */
    private $visibleOnHome;

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
        $this->projects = new ArrayCollection();
        $this->projectTypes = new ArrayCollection();
        $this->projectStatus = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return ProjectReport
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set displayOnHome.
     *
     * @param bool $displayOnHome
     *
     * @return ProjectReport
     */
    public function setDisplayOnHome($displayOnHome)
    {
        $this->displayOnHome = $displayOnHome;

        return $this;
    }

    /**
     * Get displayOnHome.
     *
     * @return bool
     */
    public function getDisplayOnHome()
    {
        return $this->displayOnHome;
    }

    /**
     * Set projects.
     *
     * @param string $projects
     *
     * @return ProjectReport
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects.
     *
     * @return string
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set projectTypes.
     *
     * @param string $projectTypes
     *
     * @return ProjectReport
     */
    public function setProjectTypes($projectTypes)
    {
        $this->projectTypes = $projectTypes;

        return $this;
    }

    /**
     * Get projectTypes.
     *
     * @return string
     */
    public function getProjectTypes()
    {
        return $this->projectTypes;
    }

    /**
     * Set projectStatus.
     *
     * @param string $projectStatus
     *
     * @return ProjectReport
     */
    public function setProjectStatus($projectStatus)
    {
        $this->projectStatus = $projectStatus;

        return $this;
    }

    /**
     * Get projectStatus.
     *
     * @return string
     */
    public function getProjectStatus()
    {
        return $this->projectStatus;
    }

    /**
     * Set user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return ProjectReport
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set sortOrder.
     *
     * @param int $sortOrder
     *
     * @return ProjectReport
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder.
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set displayInMenu.
     *
     * @param bool $displayInMenu
     *
     * @return ProjectReport
     */
    public function setDisplayInMenu($displayInMenu)
    {
        $this->displayInMenu = $displayInMenu;

        return $this;
    }

    /**
     * Get displayInMenu.
     *
     * @return bool
     */
    public function getDisplayInMenu()
    {
        return $this->displayInMenu;
    }

    /**
     * Set visibleOnHome.
     *
     * @param bool $visibleOnHome
     *
     * @return ProjectReport
     */
    public function setVisibleOnHome($visibleOnHome)
    {
        $this->visibleOnHome = $visibleOnHome;

        return $this;
    }

    /**
     * Get visibleOnHome.
     *
     * @return bool
     */
    public function getVisibleOnHome()
    {
        return $this->visibleOnHome;
    }

    /**
     * Set createdBy.
     *
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return ProjectReport
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy.
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
