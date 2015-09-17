<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Version
 *
 * @ORM\Table(name="version", indexes={@ORM\Index(name="fk_version_version_status", columns={"version_status_id"}), @ORM\Index(name="fk_version_project", columns={"project_id"})})
 * @ORM\Entity
 */
class Version
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
     * @var \AppBundle\Entity\VersionStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VersionStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="version_status_id", referencedColumnName="id")
     * })
     */
    private $versionStatus;



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
     * @return Version
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
     * @return Version
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
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Version
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
     * @return Version
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
     * Set versionStatus
     *
     * @param \AppBundle\Entity\VersionStatus $versionStatus
     * @return Version
     */
    public function setVersionStatus(\AppBundle\Entity\VersionStatus $versionStatus = null)
    {
        $this->versionStatus = $versionStatus;

        return $this;
    }

    /**
     * Get versionStatus
     *
     * @return \AppBundle\Entity\VersionStatus 
     */
    public function getVersionStatus()
    {
        return $this->versionStatus;
    }
}
