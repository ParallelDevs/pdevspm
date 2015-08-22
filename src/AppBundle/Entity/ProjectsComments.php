<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectsComments
 *
 * @ORM\Table(name="projects_comments", indexes={@ORM\Index(name="fk_projects_comments_projects", columns={"projects_id"}), @ORM\Index(name="fk_projects_comments_pople", columns={"created_by"})})
 * @ORM\Entity
 */
class ProjectsComments
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

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
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;


}
