<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectPhase
 *
 * @ORM\Table(name="project_phase", indexes={@ORM\Index(name="fk_project_phase_project", columns={"project_id"}), @ORM\Index(name="fk_project_phases_phase_status", columns={"phase_status_id"})})
 * @ORM\Entity
 */
class ProjectPhase
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
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \AppBundle\Entity\PhasesStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PhasesStatus")
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
     * @return ProjectPhase
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
     * @return ProjectPhase
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
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return ProjectPhase
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
     * Set phasesStatus
     *
     * @param \AppBundle\Entity\PhasesStatus $phasesStatus
     * @return ProjectPhase
     */
    public function setPhasesStatus(\AppBundle\Entity\PhasesStatus $phasesStatus = null)
    {
        $this->phasesStatus = $phasesStatus;

        return $this;
    }

    /**
     * Get phasesStatus
     *
     * @return \AppBundle\Entity\PhasesStatus 
     */
    public function getPhasesStatus()
    {
        return $this->phasesStatus;
    }
}
