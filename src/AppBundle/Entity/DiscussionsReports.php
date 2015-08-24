<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscussionsReports
 *
 * @ORM\Table(name="discussions_reports", indexes={@ORM\Index(name="users_id", columns={"users_id"})})
 * @ORM\Entity
 */
class DiscussionsReports
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
     * @ORM\Column(name="display_on_home", type="boolean", nullable=true)
     */
    private $displayOnHome;

    /**
     * @var string
     *
     * @ORM\Column(name="projects_id", type="text", nullable=true)
     */
    private $projectsId;

    /**
     * @var string
     *
     * @ORM\Column(name="projects_type_id", type="text", nullable=true)
     */
    private $projectsTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="projects_status_id", type="text", nullable=true)
     */
    private $projectsStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="discussions_status_id", type="text", nullable=true)
     */
    private $discussionsStatusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

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
     * @return DiscussionsReports
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
     * Set displayOnHome
     *
     * @param boolean $displayOnHome
     * @return DiscussionsReports
     */
    public function setDisplayOnHome($displayOnHome)
    {
        $this->displayOnHome = $displayOnHome;

        return $this;
    }

    /**
     * Get displayOnHome
     *
     * @return boolean 
     */
    public function getDisplayOnHome()
    {
        return $this->displayOnHome;
    }

    /**
     * Set projectsId
     *
     * @param string $projectsId
     * @return DiscussionsReports
     */
    public function setProjectsId($projectsId)
    {
        $this->projectsId = $projectsId;

        return $this;
    }

    /**
     * Get projectsId
     *
     * @return string 
     */
    public function getProjectsId()
    {
        return $this->projectsId;
    }

    /**
     * Set projectsTypeId
     *
     * @param string $projectsTypeId
     * @return DiscussionsReports
     */
    public function setProjectsTypeId($projectsTypeId)
    {
        $this->projectsTypeId = $projectsTypeId;

        return $this;
    }

    /**
     * Get projectsTypeId
     *
     * @return string 
     */
    public function getProjectsTypeId()
    {
        return $this->projectsTypeId;
    }

    /**
     * Set projectsStatusId
     *
     * @param string $projectsStatusId
     * @return DiscussionsReports
     */
    public function setProjectsStatusId($projectsStatusId)
    {
        $this->projectsStatusId = $projectsStatusId;

        return $this;
    }

    /**
     * Get projectsStatusId
     *
     * @return string 
     */
    public function getProjectsStatusId()
    {
        return $this->projectsStatusId;
    }

    /**
     * Set discussionsStatusId
     *
     * @param string $discussionsStatusId
     * @return DiscussionsReports
     */
    public function setDiscussionsStatusId($discussionsStatusId)
    {
        $this->discussionsStatusId = $discussionsStatusId;

        return $this;
    }

    /**
     * Get discussionsStatusId
     *
     * @return string 
     */
    public function getDiscussionsStatusId()
    {
        return $this->discussionsStatusId;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return DiscussionsReports
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\Users $users
     * @return DiscussionsReports
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
}
