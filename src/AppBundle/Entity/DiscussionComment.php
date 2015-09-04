<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscussionsComment
 *
 * @ORM\Table(name="discussion_comment", indexes={@ORM\Index(name="fk_discussion_comment_discussion", columns={"discussion_id"}), @ORM\Index(name="fk_discussion_comment_user", columns={"user_id"}), @ORM\Index(name="fk_discussion_status_id", columns={"discussion_status_id"})})
 * @ORM\Entity
 */
class DiscussionComment
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
     * @var \AppBundle\Entity\Discussion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Discussion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="discussion_id", referencedColumnName="id")
     * })
     */
    private $discussion;

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
     * Set description
     *
     * @param string $description
     * @return DiscussionComment
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
     * @return DiscussionComment
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
     * Set discussion
     *
     * @param \AppBundle\Entity\Discussion $discussion
     * @return DiscussionComment
     */
    public function setDiscussion(\AppBundle\Entity\Discussion $discussion = null)
    {
        $this->discussion = $discussion;

        return $this;
    }

    /**
     * Get discussion
     *
     * @return \AppBundle\Entity\Discussion
     */
    public function getDiscussion()
    {
        return $this->discussion;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return DiscussionComment
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
     * @return DiscussionComment
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
