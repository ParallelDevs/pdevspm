<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Version
 *
 * @ORM\Table(name="version", indexes={@ORM\Index(name="fk_version_version_status", columns={"version_status_id"}), @ORM\Index(name="fk_version_projects", columns={"projects_id"})})
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
     * @var \AppBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

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
     * Set projects
     *
     * @param \AppBundle\Entity\Projects $projects
     * @return Version
     */
    public function setProjects(\AppBundle\Entity\Projects $projects = null)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return \AppBundle\Entity\Projects 
     */
    public function getProjects()
    {
        return $this->projects;
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
