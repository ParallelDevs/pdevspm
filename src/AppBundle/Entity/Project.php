<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Project
 *
 * @ORM\Table(name="project", indexes={@ORM\Index(name="fk_project_project_status", columns={"project_status_id"}), @ORM\Index(name="fk_project_project_type", columns={"project_type_id"}), @ORM\Index(name="fk_project_user", columns={"created_by"})})
 * @ORM\Entity
 */
class Project
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinTable(name="project_team",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $team;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="order_task_by", type="string", length=64, nullable=true)
     */
    private $orderTaskBy;

    /**
     * @var \AppBundle\Entity\ProjectStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_status_id", referencedColumnName="id")
     * })
     */
    private $projectStatus;

    /**
     * @var \AppBundle\Entity\ProjectType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_type_id", referencedColumnName="id")
     * })
     */
    private $projectType;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    public function __construct()
    {
        $this->team = new ArrayCollection();
    }

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
     * @return Project
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
     * @return Project
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
     * Set team
     *
     * @param string $team
     * @return Project
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return string 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Project
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
     * Set orderTaskBy
     *
     * @param string $orderTaskBy
     * @return Project
     */
    public function setOrderTaskBy($orderTaskBy)
    {
        $this->orderTaskBy = $orderTaskBy;

        return $this;
    }

    /**
     * Get orderTaskBy
     *
     * @return string 
     */
    public function getOrderTaskBy()
    {
        return $this->orderTaskBy;
    }

    /**
     * Set projectStatus
     *
     * @param \AppBundle\Entity\ProjectStatus $projectStatus
     * @return Project
     */
    public function setProjectStatus(\AppBundle\Entity\ProjectStatus $projectStatus = null)
    {
        $this->projectStatus = $projectStatus;

        return $this;
    }

    /**
     * Get projectStatus
     *
     * @return \AppBundle\Entity\ProjectStatus
     */
    public function getProjectStatus()
    {
        return $this->projectStatus;
    }

    /**
     * Set projectType
     *
     * @param \AppBundle\Entity\ProjectType $projectType
     * @return Project
     */
    public function setProjectType(\AppBundle\Entity\ProjectType $projectType = null)
    {
        $this->projectType = $projectType;

        return $this;
    }

    /**
     * Get projectType
     *
     * @return \AppBundle\Entity\ProjectType
     */
    public function getProjectType()
    {
        return $this->projectType;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return Project
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
