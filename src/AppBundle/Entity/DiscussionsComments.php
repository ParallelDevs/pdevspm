<?php

namespace AppBundle\Entity;

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
     * @var \AppBundle\Entity\Discussions
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Discussions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discussions_id", referencedColumnName="id")
     * })
     */
    private $discussions;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * @var \AppBundle\Entity\DiscussionsStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DiscussionsStatus")
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
     * @param \AppBundle\Entity\Discussions $discussions
     * @return DiscussionsComments
     */
    public function setDiscussions(\AppBundle\Entity\Discussions $discussions = null)
    {
        $this->discussions = $discussions;

        return $this;
    }

    /**
     * Get discussions
     *
     * @return \AppBundle\Entity\Discussions 
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\Users $users
     * @return DiscussionsComments
     */
    public function setUsers(\AppBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set discussionsStatus
     *
     * @param \AppBundle\Entity\DiscussionsStatus $discussionsStatus
     * @return DiscussionsComments
     */
    public function setDiscussionsStatus(\AppBundle\Entity\DiscussionsStatus $discussionsStatus = null)
    {
        $this->discussionsStatus = $discussionsStatus;

        return $this;
    }

    /**
     * Get discussionsStatus
     *
     * @return \AppBundle\Entity\DiscussionsStatus 
     */
    public function getDiscussionsStatus()
    {
        return $this->discussionsStatus;
    }
}
