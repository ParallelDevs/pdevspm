<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TasksGroups
 *
 * @ORM\Table(name="tasks_groups", indexes={@ORM\Index(name="fk_tasks_groups_projects", columns={"projects_id"})})
 * @ORM\Entity
 */
class TasksGroups
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
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;



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
     * @return TasksGroups
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
     * Set projects
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\Projects $projects
     * @return TasksGroups
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
}
