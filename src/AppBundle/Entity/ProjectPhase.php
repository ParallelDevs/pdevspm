<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectPhase
 *
 * @ORM\Table(name="project_phase", indexes={@ORM\Index(name="fk_project_phase_project", columns={"project_id"}), @ORM\Index(name="fk_project_phase_phase_status", columns={"phase_status_id"})})
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
     * @var \AppBundle\Entity\PhaseStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PhaseStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_status_id", referencedColumnName="id")
     * })
     */
    private $phaseStatus;



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
     * Set phaseStatus
     *
     * @param \AppBundle\Entity\PhaseStatus $phaseStatus
     * @return ProjectPhase
     */
    public function setPhaseStatus(\AppBundle\Entity\PhaseStatus $phaseStatus = null)
    {
        $this->phaseStatus = $phaseStatus;

        return $this;
    }

    /**
     * Get phaseStatus
     *
     * @return \AppBundle\Entity\PhaseStatus
     */
    public function getPhaseStatus()
    {
        return $this->phaseStatus;
    }
}
