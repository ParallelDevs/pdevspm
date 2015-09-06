<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discussion
 *
 * @ORM\Table(name="discussion", indexes={@ORM\Index(name="fk_discussion_project", columns={"project_id"}), @ORM\Index(name="fk_discussion_user", columns={"user_id"}), @ORM\Index(name="fk_discussion_discussion_status", columns={"discussion_status_id"})})
 * @ORM\Entity
 */
class Discussion
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
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

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
     * @var \AppBundle\Entity\DiscussionStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DiscussionStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discussion_status_id", referencedColumnName="id")
     * })
     */
    private $discussionStatus;



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
     * @return Discussion
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
     * @return Discussion
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
     * @return Discussion
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
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return Discussion
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Discussion
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

    /**
     * Set discussionStatus
     *
     * @param \AppBundle\Entity\DiscussionStatus $discussionStatus
     * @return Discussion
     */
    public function setDiscussionStatus(\AppBundle\Entity\DiscussionStatus $discussionStatus = null)
    {
        $this->discussionStatus = $discussionStatus;

        return $this;
    }

    /**
     * Get discussionStatus
     *
     * @return \AppBundle\Entity\DiscussionStatus
     */
    public function getDiscussionStatus()
    {
        return $this->discussionStatus;
    }
}
