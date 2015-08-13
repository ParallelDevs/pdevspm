<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectsPhases
 *
 * @ORM\Table(name="projects_phases", indexes={@ORM\Index(name="fk_projects_phases_projects", columns={"projects_id"}), @ORM\Index(name="fk_projects_phases_phases_status", columns={"phases_status_id"})})
 * @ORM\Entity
 */
class ProjectsPhases
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
     * @var \DateTime
     *
     * @ORM\Column(name="due_date", type="date", nullable=true)
     */
    private $dueDate;

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
     * @var \ParallelDevs\ProjectManagementBundle\Entity\PhasesStatus
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\PhasesStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phases_status_id", referencedColumnName="id")
     * })
     */
    private $phasesStatus;



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
     * @return ProjectsPhases
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
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return ProjectsPhases
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set projects
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Projects $projects
     * @return ProjectsPhases
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
     * Set phasesStatus
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\PhasesStatus $phasesStatus
     * @return ProjectsPhases
     */
    public function setPhasesStatus(\ParallelDevs\ProjectManagementBundle\Entity\PhasesStatus $phasesStatus = null)
    {
        $this->phasesStatus = $phasesStatus;

        return $this;
    }

    /**
     * Get phasesStatus
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\PhasesStatus 
     */
    public function getPhasesStatus()
    {
        return $this->phasesStatus;
    }
}
