<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroup.
 *
 * @ORM\Table(name="user_group")
 * @ORM\Entity
 */
class UserGroup
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
     * @ORM\Column(name="allow_view_all", type="boolean", nullable=true)
     */
    private $allowViewAll;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_projects", type="boolean", nullable=true)
     */
    private $allowManageProjects;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_tasks", type="boolean", nullable=true)
     */
    private $allowManageTasks;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_tickets", type="boolean", nullable=true)
     */
    private $allowManageTickets;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_user", type="boolean", nullable=true)
     */
    private $allowManageUser;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_configuration", type="boolean", nullable=true)
     */
    private $allowManageConfiguration;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_tasks_viewonly", type="boolean", nullable=true)
     */
    private $allowManageTasksViewonly;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_discussions", type="boolean", nullable=true)
     */
    private $allowManageDiscussions;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_manage_discussions_viewonly", type="boolean", nullable=true)
     */
    private $allowManageDiscussionsViewonly;

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
     * @return UserGroup
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
     * Set allowViewAll.
     *
     * @param bool $allowViewAll
     *
     * @return UserGroup
     */
    public function setAllowViewAll($allowViewAll)
    {
        $this->allowViewAll = $allowViewAll;

        return $this;
    }

    /**
     * Get allowViewAll.
     *
     * @return bool
     */
    public function getAllowViewAll()
    {
        return $this->allowViewAll;
    }

    /**
     * Set allowManageProjects.
     *
     * @param bool $allowManageProjects
     *
     * @return UserGroup
     */
    public function setAllowManageProjects($allowManageProjects)
    {
        $this->allowManageProjects = $allowManageProjects;

        return $this;
    }

    /**
     * Get allowManageProjects.
     *
     * @return bool
     */
    public function getAllowManageProjects()
    {
        return $this->allowManageProjects;
    }

    /**
     * Set allowManageTasks.
     *
     * @param bool $allowManageTasks
     *
     * @return UserGroup
     */
    public function setAllowManageTasks($allowManageTasks)
    {
        $this->allowManageTasks = $allowManageTasks;

        return $this;
    }

    /**
     * Get allowManageTasks.
     *
     * @return bool
     */
    public function getAllowManageTasks()
    {
        return $this->allowManageTasks;
    }

    /**
     * Set allowManageTickets.
     *
     * @param bool $allowManageTickets
     *
     * @return UserGroup
     */
    public function setAllowManageTickets($allowManageTickets)
    {
        $this->allowManageTickets = $allowManageTickets;

        return $this;
    }

    /**
     * Get allowManageTickets.
     *
     * @return bool
     */
    public function getAllowManageTickets()
    {
        return $this->allowManageTickets;
    }

    /**
     * Set allowManageUser.
     *
     * @param bool $allowManageUser
     *
     * @return UserGroup
     */
    public function setAllowManageUser($allowManageUser)
    {
        $this->allowManageUser = $allowManageUser;

        return $this;
    }

    /**
     * Get allowManageUser.
     *
     * @return bool
     */
    public function getAllowManageUser()
    {
        return $this->allowManageUser;
    }

    /**
     * Set allowManageConfiguration.
     *
     * @param bool $allowManageConfiguration
     *
     * @return UserGroup
     */
    public function setAllowManageConfiguration($allowManageConfiguration)
    {
        $this->allowManageConfiguration = $allowManageConfiguration;

        return $this;
    }

    /**
     * Get allowManageConfiguration.
     *
     * @return bool
     */
    public function getAllowManageConfiguration()
    {
        return $this->allowManageConfiguration;
    }

    /**
     * Set allowManageTasksViewonly.
     *
     * @param bool $allowManageTasksViewonly
     *
     * @return UserGroup
     */
    public function setAllowManageTasksViewonly($allowManageTasksViewonly)
    {
        $this->allowManageTasksViewonly = $allowManageTasksViewonly;

        return $this;
    }

    /**
     * Get allowManageTasksViewonly.
     *
     * @return bool
     */
    public function getAllowManageTasksViewonly()
    {
        return $this->allowManageTasksViewonly;
    }

    /**
     * Set allowManageDiscussions.
     *
     * @param bool $allowManageDiscussions
     *
     * @return UserGroup
     */
    public function setAllowManageDiscussions($allowManageDiscussions)
    {
        $this->allowManageDiscussions = $allowManageDiscussions;

        return $this;
    }

    /**
     * Get allowManageDiscussions.
     *
     * @return bool
     */
    public function getAllowManageDiscussions()
    {
        return $this->allowManageDiscussions;
    }

    /**
     * Set allowManageDiscussionsViewonly.
     *
     * @param bool $allowManageDiscussionsViewonly
     *
     * @return UserGroup
     */
    public function setAllowManageDiscussionsViewonly($allowManageDiscussionsViewonly)
    {
        $this->allowManageDiscussionsViewonly = $allowManageDiscussionsViewonly;

        return $this;
    }

    /**
     * Get allowManageDiscussionsViewonly.
     *
     * @return bool
     */
    public function getAllowManageDiscussionsViewonly()
    {
        return $this->allowManageDiscussionsViewonly;
    }
}
