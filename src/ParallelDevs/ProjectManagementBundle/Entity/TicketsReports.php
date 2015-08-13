<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsReports
 *
 * @ORM\Table(name="tickets_reports", indexes={@ORM\Index(name="users_id", columns={"users_id"})})
 * @ORM\Entity
 */
class TicketsReports
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
     * @ORM\Column(name="departments_id", type="text", nullable=true)
     */
    private $departmentsId;

    /**
     * @var string
     *
     * @ORM\Column(name="tickets_types_id", type="text", nullable=true)
     */
    private $ticketsTypesId;

    /**
     * @var string
     *
     * @ORM\Column(name="tickets_status_id", type="text", nullable=true)
     */
    private $ticketsStatusId;

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
     * @return TicketsReports
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
     * @return TicketsReports
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
     * @return TicketsReports
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
     * @return TicketsReports
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
     * @return TicketsReports
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
     * Set departmentsId
     *
     * @param string $departmentsId
     * @return TicketsReports
     */
    public function setDepartmentsId($departmentsId)
    {
        $this->departmentsId = $departmentsId;

        return $this;
    }

    /**
     * Get departmentsId
     *
     * @return string 
     */
    public function getDepartmentsId()
    {
        return $this->departmentsId;
    }

    /**
     * Set ticketsTypesId
     *
     * @param string $ticketsTypesId
     * @return TicketsReports
     */
    public function setTicketsTypesId($ticketsTypesId)
    {
        $this->ticketsTypesId = $ticketsTypesId;

        return $this;
    }

    /**
     * Get ticketsTypesId
     *
     * @return string 
     */
    public function getTicketsTypesId()
    {
        return $this->ticketsTypesId;
    }

    /**
     * Set ticketsStatusId
     *
     * @param string $ticketsStatusId
     * @return TicketsReports
     */
    public function setTicketsStatusId($ticketsStatusId)
    {
        $this->ticketsStatusId = $ticketsStatusId;

        return $this;
    }

    /**
     * Get ticketsStatusId
     *
     * @return string 
     */
    public function getTicketsStatusId()
    {
        return $this->ticketsStatusId;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return TicketsReports
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
     * @return TicketsReports
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
