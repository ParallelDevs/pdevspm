<?php

namespace AppBundle\Entity;

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
     * @var \AppBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_id", referencedColumnName="id")
     * })
     */
    private $projects;

    /**
     * @var \AppBundle\Entity\PhasesStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PhasesStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phases_status_id", referencedColumnName="id")
     * })
     */
    private $phasesStatus;


}
