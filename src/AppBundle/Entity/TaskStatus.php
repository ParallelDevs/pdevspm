<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskStatus
 *
 * @ORM\Table(name="task_status", indexes={@ORM\Index(name="fk_task_status_group", columns={"task_group_id"})})
 * @ORM\Entity
 */
class TaskStatus
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
     * @var \AppBundle\Entity\TaskGroup
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_group_id", referencedColumnName="id")
     * })
     */
    private $group;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="default_value", type="boolean", nullable=true)
     */
    private $defaultValue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;



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
     * @return TaskStatus
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
     * Set group
     *
     * @param \AppBundle\Entity\TaskGroup $group
     * @return TaskGroup
     */
    public function setGroup(\AppBundle\Entity\TaskGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\TaskGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return TaskStatus
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set defaultValue
     *
     * @param boolean $defaultValue
     * @return TaskStatus
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * Get defaultValue
     *
     * @return boolean 
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return TaskStatus
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
}
