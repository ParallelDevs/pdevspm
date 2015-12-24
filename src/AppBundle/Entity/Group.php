<?php
/**
 * Created by PhpStorm.
 * User: danielnv18
 * Date: 12/24/15
 * Time: 11:50 AM
 */

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
     * @ORM\Column(name="manage_tasks_viewonly", type="boolean", nullable=true)
     */
    protected $ManageTasksViewonly;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_discussions", type="boolean", nullable=true)
     */
    protected $ManageDiscussions;
    /**
     * @var bool
     *
     * @ORM\Column(name="manage_discussions_viewonly", type="boolean", nullable=true)
     */
    protected $ManageDiscussionsViewonly;
}