<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @ORM\Table(name="projects", indexes={@ORM\Index(name="fk_projects_projects_status", columns={"projects_status_id"}), @ORM\Index(name="fk_projects_project_types", columns={"projects_types_id"}), @ORM\Index(name="fk_projects_pople", columns={"created_by"})})
 * @ORM\Entity
 */
class Projects
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
     * @ORM\Column(name="team", type="text", nullable=true)
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
     * @ORM\Column(name="order_tasks_by", type="string", length=64, nullable=true)
     */
    private $orderTasksBy;  

    /**
     * @var \AppBundle\Entity\ProjectsStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_status_id", referencedColumnName="id")
     * })
     */
    private $projectsStatus;

    /**
     * @var \AppBundle\Entity\ProjectsTypes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectsTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_types_id", referencedColumnName="id")
     * })
     */
    private $projectsTypes;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;



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
     * @return Projects
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
     * @return Projects
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
     * @return Projects
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
     * @return Projects
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
     * Set orderTasksBy
     *
     * @param string $orderTasksBy
     * @return Projects
     */
    public function setOrderTasksBy($orderTasksBy)
    {
        $this->orderTasksBy = $orderTasksBy;

        return $this;
    }

    /**
     * Get orderTasksBy
     *
     * @return string 
     */
    public function getOrderTasksBy()
    {
        return $this->orderTasksBy;
    }

    /**
     * Set projectsStatus
     *
     * @param \AppBundle\Entity\ProjectsStatus $projectsStatus
     * @return Projects
     */
    public function setProjectsStatus(\AppBundle\Entity\ProjectsStatus $projectsStatus = null)
    {
        $this->projectsStatus = $projectsStatus;

        return $this;
    }

    /**
     * Get projectsStatus
     *
     * @return \AppBundle\Entity\ProjectsStatus 
     */
    public function getProjectsStatus()
    {
        return $this->projectsStatus;
    }

    /**
     * Set projectsTypes
     *
     * @param \AppBundle\Entity\ProjectsTypes $projectsTypes
     * @return Projects
     */
    public function setProjectsTypes(\AppBundle\Entity\ProjectsTypes $projectsTypes = null)
    {
        $this->projectsTypes = $projectsTypes;

        return $this;
    }

    /**
     * Get projectsTypes
     *
     * @return \AppBundle\Entity\ProjectsTypes 
     */
    public function getProjectsTypes()
    {
        return $this->projectsTypes;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\Users $createdBy
     * @return Projects
     */
    public function setCreatedBy(\AppBundle\Entity\Users $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
