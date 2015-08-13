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


}
