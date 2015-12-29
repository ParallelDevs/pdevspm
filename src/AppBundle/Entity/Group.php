<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="view_all", type="boolean", nullable=true)
     */
    protected $ViewAll;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_projects", type="boolean", nullable=true)
     */
    protected $ManageProjects;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_tasks", type="boolean", nullable=true)
     */
    protected $ManageTasks;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_tickets", type="boolean", nullable=true)
     */
    protected $ManageTickets;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_user", type="boolean", nullable=true)
     */
    protected $ManageUser;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_configuration", type="boolean", nullable=true)
     */
    protected $ManageConfiguration;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_tasks_view_only", type="boolean", nullable=true)
     */
    protected $ManageTasksViewOnly;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_discussions", type="boolean", nullable=true)
     */
    protected $ManageDiscussions;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_discussions_view_only", type="boolean", nullable=true)
     */
    protected $ManageDiscussionsViewOnly;

    public function __construct($name, $roles = [])
    {
        parent::__construct($name, $roles);
        $this->addRole('ROLE_USER');
    }

    /**
     * Set viewAll.
     *
     * @param bool $viewAll
     *
     * @return Group
     */
    public function setViewAll($viewAll)
    {
        $this->ViewAll = $viewAll;

        return $this;
    }

    /**
     * Get viewAll.
     *
     * @return bool
     */
    public function getViewAll()
    {
        return $this->ViewAll;
    }

    /**
     * Set manageProjects.
     *
     * @param bool $manageProjects
     *
     * @return Group
     */
    public function setManageProjects($manageProjects)
    {
        $this->ManageProjects = $manageProjects;

        return $this;
    }

    /**
     * Get manageProjects.
     *
     * @return bool
     */
    public function getManageProjects()
    {
        return $this->ManageProjects;
    }

    /**
     * Set manageTasks.
     *
     * @param bool $manageTasks
     *
     * @return Group
     */
    public function setManageTasks($manageTasks)
    {
        $this->ManageTasks = $manageTasks;

        return $this;
    }

    /**
     * Get manageTasks.
     *
     * @return bool
     */
    public function getManageTasks()
    {
        return $this->ManageTasks;
    }

    /**
     * Set manageTickets.
     *
     * @param bool $manageTickets
     *
     * @return Group
     */
    public function setManageTickets($manageTickets)
    {
        $this->ManageTickets = $manageTickets;

        return $this;
    }

    /**
     * Get manageTickets.
     *
     * @return bool
     */
    public function getManageTickets()
    {
        return $this->ManageTickets;
    }

    /**
     * Set manageUser.
     *
     * @param bool $manageUser
     *
     * @return Group
     */
    public function setManageUser($manageUser)
    {
        $this->ManageUser = $manageUser;

        return $this;
    }

    /**
     * Get manageUser.
     *
     * @return bool
     */
    public function getManageUser()
    {
        return $this->ManageUser;
    }

    /**
     * Set manageConfiguration.
     *
     * @param bool $manageConfiguration
     *
     * @return Group
     */
    public function setManageConfiguration($manageConfiguration)
    {
        $this->ManageConfiguration = $manageConfiguration;

        return $this;
    }

    /**
     * Get manageConfiguration.
     *
     * @return bool
     */
    public function getManageConfiguration()
    {
        return $this->ManageConfiguration;
    }

    /**
     * Set manageTasksViewonly.
     *
     * @param bool $manageTasksViewOnly
     *
     * @return Group
     */
    public function setManageTasksViewOnly($manageTasksViewOnly)
    {
        $this->ManageTasksViewOnly = $manageTasksViewOnly;

        return $this;
    }

    /**
     * Get manageTasksViewonly.
     *
     * @return bool
     */
    public function getManageTasksViewOnly()
    {
        return $this->ManageTasksViewOnly;
    }

    /**
     * Set manageDiscussions.
     *
     * @param bool $manageDiscussions
     *
     * @return Group
     */
    public function setManageDiscussions($manageDiscussions)
    {
        $this->ManageDiscussions = $manageDiscussions;

        return $this;
    }

    /**
     * Get manageDiscussions.
     *
     * @return bool
     */
    public function getManageDiscussions()
    {
        return $this->ManageDiscussions;
    }

    /**
     * Set manageDiscussionsViewOnly.
     *
     * @param bool $manageDiscussionsViewOnly
     *
     * @return Group
     */
    public function setManageDiscussionsViewOnly($manageDiscussionsViewOnly)
    {
        $this->ManageDiscussionsViewOnly = $manageDiscussionsViewOnly;

        return $this;
    }

    /**
     * Get manageDiscussionsViewOnly.
     *
     * @return bool
     */
    public function getManageDiscussionsViewOnly()
    {
        return $this->ManageDiscussionsViewOnly;
    }
}
