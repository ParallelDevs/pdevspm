<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TasksComments
 *
 * @ORM\Table(name="tasks_comments", indexes={@ORM\Index(name="fk_tasks_comments_pople", columns={"created_by"}), @ORM\Index(name="fk_tasks_comments_tasks", columns={"tasks_id"}), @ORM\Index(name="fk_tasks_comments_status", columns={"tasks_status_id"}), @ORM\Index(name="fk_tasks_comments_priority", columns={"tasks_priority_id"})})
 * @ORM\Entity
 */
class TasksComments
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
     * @var \DateTime
     *
     * @ORM\Column(name="due_date", type="date", nullable=true)
     */
    private $dueDate;

    /**
     * @var float
     *
     * @ORM\Column(name="worked_hours", type="float", precision=10, scale=0, nullable=true)
     */
    private $workedHours;

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
     * @var integer
     *
     * @ORM\Column(name="progress", type="integer", nullable=true)
     */
    private $progress;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Tasks
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_id", referencedColumnName="id")
     * })
     */
    private $tasks;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksStatus
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_status_id", referencedColumnName="id")
     * })
     */
    private $tasksStatus;

    /**
     * @var \ParallelDevs\ProjectManagementBundle\Entity\TasksPriority
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\TasksPriority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_priority_id", referencedColumnName="id")
     * })
     */
    private $tasksPriority;


}
