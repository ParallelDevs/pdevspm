<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

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
     * @var \ParallelDevs\ProjectManagementBundle\Entity\ProjectsStatus
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\ProjectsStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_status_id", referencedColumnName="id")
     * })
     */
    private $projectsStatus;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\ProjectsTypes
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\ProjectsTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projects_types_id", referencedColumnName="id")
     * })
     */
    private $projectsTypes;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;


}
