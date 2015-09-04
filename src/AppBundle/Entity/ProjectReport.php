<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectsReport
 *
 * @ORM\Table(name="project_report", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class ProjectReport
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
     * @ORM\Column(name="project_id", type="text", nullable=true)
     */
    private $projectId;

    /**
     * @var string
     *
     * @ORM\Column(name="project_type_id", type="text", nullable=true)
     */
    private $projectTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="project_status_id", type="text", nullable=true)
     */
    private $projectStatusId;

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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * @return ProjectReport
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
     * @return ProjectReport
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
     * Set projectId
     *
     * @param string $projectId
     * @return ProjectReport
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return string 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set projectTypeId
     *
     * @param string $projectTypeId
     * @return ProjectReport
     */
    public function setProjectTypeId($projectTypeId)
    {
        $this->projectTypeId = $projectTypeId;

        return $this;
    }

    /**
     * Get projectTypeId
     *
     * @return string 
     */
    public function getProjectTypeId()
    {
        return $this->projectTypeId;
    }

    /**
     * Set projectStatusId
     *
     * @param string $projectStatusId
     * @return ProjectReport
     */
    public function setProjectStatusId($projectStatusId)
    {
        $this->projectStatusId = $projectStatusId;

        return $this;
    }

    /**
     * Get projectStatusId
     *
     * @return string 
     */
    public function getProjectStatusId()
    {
        return $this->projectStatusId;
    }

    /**
     * Set inTeam
     *
     * @param integer $inTeam
     * @return ProjectReport
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
     * @return ProjectReport
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
     * @return ProjectReport
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
     * @return ProjectReport
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return ProjectReport
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
