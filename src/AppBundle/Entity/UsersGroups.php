<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersGroups
 *
 * @ORM\Table(name="users_groups")
 * @ORM\Entity
 */
class UsersGroups
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
     * @ORM\Column(name="allow_view_all", type="boolean", nullable=true)
     */
    private $allowViewAll;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_projects", type="boolean", nullable=true)
     */
    private $allowManageProjects;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_tasks", type="boolean", nullable=true)
     */
    private $allowManageTasks;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_tickets", type="boolean", nullable=true)
     */
    private $allowManageTickets;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_users", type="boolean", nullable=true)
     */
    private $allowManageUsers;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_configuration", type="boolean", nullable=true)
     */
    private $allowManageConfiguration;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_tasks_viewonly", type="boolean", nullable=true)
     */
    private $allowManageTasksViewonly;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_discussions", type="boolean", nullable=true)
     */
    private $allowManageDiscussions;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allow_manage_discussions_viewonly", type="boolean", nullable=true)
     */
    private $allowManageDiscussionsViewonly;



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
     * @return UsersGroups
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
     * Set allowViewAll
     *
     * @param boolean $allowViewAll
     * @return UsersGroups
     */
    public function setAllowViewAll($allowViewAll)
    {
        $this->allowViewAll = $allowViewAll;

        return $this;
    }

    /**
     * Get allowViewAll
     *
     * @return boolean 
     */
    public function getAllowViewAll()
    {
        return $this->allowViewAll;
    }

    /**
     * Set allowManageProjects
     *
     * @param boolean $allowManageProjects
     * @return UsersGroups
     */
    public function setAllowManageProjects($allowManageProjects)
    {
        $this->allowManageProjects = $allowManageProjects;

        return $this;
    }

    /**
     * Get allowManageProjects
     *
     * @return boolean 
     */
    public function getAllowManageProjects()
    {
        return $this->allowManageProjects;
    }

    /**
     * Set allowManageTasks
     *
     * @param boolean $allowManageTasks
     * @return UsersGroups
     */
    public function setAllowManageTasks($allowManageTasks)
    {
        $this->allowManageTasks = $allowManageTasks;

        return $this;
    }

    /**
     * Get allowManageTasks
     *
     * @return boolean 
     */
    public function getAllowManageTasks()
    {
        return $this->allowManageTasks;
    }

    /**
     * Set allowManageTickets
     *
     * @param boolean $allowManageTickets
     * @return UsersGroups
     */
    public function setAllowManageTickets($allowManageTickets)
    {
        $this->allowManageTickets = $allowManageTickets;

        return $this;
    }

    /**
     * Get allowManageTickets
     *
     * @return boolean 
     */
    public function getAllowManageTickets()
    {
        return $this->allowManageTickets;
    }

    /**
     * Set allowManageUsers
     *
     * @param boolean $allowManageUsers
     * @return UsersGroups
     */
    public function setAllowManageUsers($allowManageUsers)
    {
        $this->allowManageUsers = $allowManageUsers;

        return $this;
    }

    /**
     * Get allowManageUsers
     *
     * @return boolean 
     */
    public function getAllowManageUsers()
    {
        return $this->allowManageUsers;
    }

    /**
     * Set allowManageConfiguration
     *
     * @param boolean $allowManageConfiguration
     * @return UsersGroups
     */
    public function setAllowManageConfiguration($allowManageConfiguration)
    {
        $this->allowManageConfiguration = $allowManageConfiguration;

        return $this;
    }

    /**
     * Get allowManageConfiguration
     *
     * @return boolean 
     */
    public function getAllowManageConfiguration()
    {
        return $this->allowManageConfiguration;
    }

    /**
     * Set allowManageTasksViewonly
     *
     * @param boolean $allowManageTasksViewonly
     * @return UsersGroups
     */
    public function setAllowManageTasksViewonly($allowManageTasksViewonly)
    {
        $this->allowManageTasksViewonly = $allowManageTasksViewonly;

        return $this;
    }

    /**
     * Get allowManageTasksViewonly
     *
     * @return boolean 
     */
    public function getAllowManageTasksViewonly()
    {
        return $this->allowManageTasksViewonly;
    }

    /**
     * Set allowManageDiscussions
     *
     * @param boolean $allowManageDiscussions
     * @return UsersGroups
     */
    public function setAllowManageDiscussions($allowManageDiscussions)
    {
        $this->allowManageDiscussions = $allowManageDiscussions;

        return $this;
    }

    /**
     * Get allowManageDiscussions
     *
     * @return boolean 
     */
    public function getAllowManageDiscussions()
    {
        return $this->allowManageDiscussions;
    }

    /**
     * Set allowManageDiscussionsViewonly
     *
     * @param boolean $allowManageDiscussionsViewonly
     * @return UsersGroups
     */
    public function setAllowManageDiscussionsViewonly($allowManageDiscussionsViewonly)
    {
        $this->allowManageDiscussionsViewonly = $allowManageDiscussionsViewonly;

        return $this;
    }

    /**
     * Get allowManageDiscussionsViewonly
     *
     * @return boolean 
     */
    public function getAllowManageDiscussionsViewonly()
    {
        return $this->allowManageDiscussionsViewonly;
    }
}
