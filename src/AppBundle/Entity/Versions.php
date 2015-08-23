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


}
