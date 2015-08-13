<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectsReports
 *
 * @ORM\Table(name="projects_reports", indexes={@ORM\Index(name="users_id", columns={"users_id"})})
 * @ORM\Entity
 */
class ProjectsReports
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
     * @var integer
     *
     * @ORM\Column(name="in_team", type="integer", nullable=true)
     */
    private $inTeam;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="display_in_menu", type="boolean", nullable=true)
     */
    private $displayInMenu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible_on_home", type="boolean", nullable=true)
     */
    private $visibleOnHome;

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
     * @return ProjectsReports
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
     * @return ProjectsReports
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
     * @return ProjectsReports
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
     * @return ProjectsReports
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
     * @return ProjectsReports
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
     * Set inTeam
     *
     * @param integer $inTeam
     * @return ProjectsReports
     */
    public function setInTeam($inTeam)
    {
        $this->inTeam = $inTeam;

        return $this;
    }

    /**
     * Get inTeam
     *
     * @return integer 
     */
    public function getInTeam()
    {
        return $this->inTeam;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return ProjectsReports
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
     * Set displayInMenu
     *
     * @param boolean $displayInMenu
     * @return ProjectsReports
     */
    public function setDisplayInMenu($displayInMenu)
    {
        $this->displayInMenu = $displayInMenu;

        return $this;
    }

    /**
     * Get displayInMenu
     *
     * @return boolean 
     */
    public function getDisplayInMenu()
    {
        return $this->displayInMenu;
    }

    /**
     * Set visibleOnHome
     *
     * @param boolean $visibleOnHome
     * @return ProjectsReports
     */
    public function setVisibleOnHome($visibleOnHome)
    {
        $this->visibleOnHome = $visibleOnHome;

        return $this;
    }

    /**
     * Get visibleOnHome
     *
     * @return boolean 
     */
    public function getVisibleOnHome()
    {
        return $this->visibleOnHome;
    }

    /**
     * Set users
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Users $users
     * @return ProjectsReports
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
