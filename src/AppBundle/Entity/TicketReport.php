<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketReport.
 *
 * @ORM\Table(name="ticket_report", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class TicketReport
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
     * @var string
     *
     * @ORM\Column(name="department_id", type="text", nullable=true)
     */
    private $departmentId;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_types_id", type="text", nullable=true)
     */
    private $ticketTypesId;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_status_id", type="text", nullable=true)
     */
    private $ticketStatusId;

    /**
     * @var int
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

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
     * @return TicketReport
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
     * @return TicketReport
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
     * Set projectId.
     *
     * @param string $projectId
     *
     * @return TicketReport
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId.
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set projectTypeId.
     *
     * @param string $projectTypeId
     *
     * @return TicketReport
     */
    public function setProjectTypeId($projectTypeId)
    {
        $this->projectTypeId = $projectTypeId;

        return $this;
    }

    /**
     * Get projectTypeId.
     *
     * @return string
     */
    public function getProjectTypeId()
    {
        return $this->projectTypeId;
    }

    /**
     * Set projectStatusId.
     *
     * @param string $projectStatusId
     *
     * @return TicketReport
     */
    public function setProjectStatusId($projectStatusId)
    {
        $this->projectStatusId = $projectStatusId;

        return $this;
    }

    /**
     * Get projectStatusId.
     *
     * @return string
     */
    public function getProjectStatusId()
    {
        return $this->projectStatusId;
    }

    /**
     * Set departmentId.
     *
     * @param string $departmentId
     *
     * @return TicketReport
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * Get departmentId.
     *
     * @return string
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Set ticketTypesId.
     *
     * @param string $ticketTypesId
     *
     * @return TicketReport
     */
    public function setTicketTypesId($ticketTypesId)
    {
        $this->ticketTypesId = $ticketTypesId;

        return $this;
    }

    /**
     * Get ticketTypesId.
     *
     * @return string
     */
    public function getTicketTypesId()
    {
        return $this->ticketTypesId;
    }

    /**
     * Set ticketStatusId.
     *
     * @param string $ticketStatusId
     *
     * @return TicketReport
     */
    public function setTicketStatusId($ticketStatusId)
    {
        $this->ticketStatusId = $ticketStatusId;

        return $this;
    }

    /**
     * Get ticketStatusId.
     *
     * @return string
     */
    public function getTicketStatusId()
    {
        return $this->ticketStatusId;
    }

    /**
     * Set sortOrder.
     *
     * @param int $sortOrder
     *
     * @return TicketReport
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
     * Set user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return TicketReport
     */
    public function setUser(\AppBundle\Entity\User $user = null)
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
}
