<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discussions
 *
 * @ORM\Table(name="discussions", indexes={@ORM\Index(name="fk_discussions_projects", columns={"projects_id"}), @ORM\Index(name="fk_discussions_users", columns={"users_id"}), @ORM\Index(name="fk_discussions_discussions_status", columns={"discussions_status_id"})})
 * @ORM\Entity
 */
class Discussions
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="assigned_to", type="string", length=255, nullable=false)
     */
    private $assignedTo;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

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
     * @var \ParallelDevs\ProjectManagementBundle\Entity\DiscussionsStatus
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\DiscussionsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discussions_status_id", referencedColumnName="id")
     * })
     */
    private $discussionsStatus;



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
     * @return Discussions
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
     * Set description
     *
     * @param string $description
     * @return Discussions
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set assignedTo
     *
     * @param string $assignedTo
     * @return Discussions
     */
    public function setAssignedTo($assignedTo)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * Get assignedTo
     *
     * @return string 
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * Set projects
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Projects $projects
     * @return Discussions
     */
    public function setProjects(\ParallelDevs\ProjectManagementBundle\Entity\Projects $projects = null)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Projects 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set users
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Users $users
     * @return Discussions
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

    /**
     * Set discussionsStatus
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\DiscussionsStatus $discussionsStatus
     * @return Discussions
     */
    public function setDiscussionsStatus(\ParallelDevs\ProjectManagementBundle\Entity\DiscussionsStatus $discussionsStatus = null)
    {
        $this->discussionsStatus = $discussionsStatus;

        return $this;
    }

    /**
     * Get discussionsStatus
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\DiscussionsStatus 
     */
    public function getDiscussionsStatus()
    {
        return $this->discussionsStatus;
    }
}
