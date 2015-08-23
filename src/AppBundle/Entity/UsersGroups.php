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


}
