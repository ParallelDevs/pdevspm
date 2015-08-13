<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscussionsComments
 *
 * @ORM\Table(name="discussions_comments", indexes={@ORM\Index(name="fk_discussions_comments_discussions", columns={"discussions_id"}), @ORM\Index(name="fk_discussions_comments_users", columns={"users_id"}), @ORM\Index(name="fk_discussions_status_id", columns={"discussions_status_id"})})
 * @ORM\Entity
 */
class DiscussionsComments
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Discussions
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Discussions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discussions_id", referencedColumnName="id")
     * })
     */
    private $discussions;

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
     * Set description
     *
     * @param string $description
     * @return DiscussionsComments
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return DiscussionsComments
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set discussions
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Discussions $discussions
     * @return DiscussionsComments
     */
    public function setDiscussions(\ParallelDevs\ProjectManagementBundle\Entity\Discussions $discussions = null)
    {
        $this->discussions = $discussions;

        return $this;
    }

    /**
     * Get discussions
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\Discussions 
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * Set users
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Users $users
     * @return DiscussionsComments
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
     * @return DiscussionsComments
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
