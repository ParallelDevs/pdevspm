<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Versions
 *
 * @ORM\Table(name="versions", indexes={@ORM\Index(name="fk_versions_versions_status", columns={"versions_status_id"}), @ORM\Index(name="fk_versions_projects", columns={"projects_id"})})
 * @ORM\Entity
 */
class Versions
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
     * @var \AppBundle\Entity\VersionsStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VersionsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="versions_status_id", referencedColumnName="id")
     * })
     */
    private $versionsStatus;



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
     * @return Versions
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
     * @return Versions
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
     * @return Versions
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
     * @return Versions
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
     * Set versionsStatus
     *
     * @param \AppBundle\Entity\VersionsStatus $versionsStatus
     * @return Versions
     */
    public function setVersionsStatus(\AppBundle\Entity\VersionsStatus $versionsStatus = null)
    {
        $this->versionsStatus = $versionsStatus;

        return $this;
    }

    /**
     * Get versionsStatus
     *
     * @return \AppBundle\Entity\VersionsStatus 
     */
    public function getVersionsStatus()
    {
        return $this->versionsStatus;
    }
}
