<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketStatus.
 *
 * @ORM\Table(name="ticket_status")
 * @ORM\Entity
 */
class TicketStatus
{
    /**
     * @var int
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
     * @ORM\Column(name="group", type="string", length=64, nullable=true)
     */
    private $group;

    /**
     * @var int
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var int
     *
     * @ORM\Column(name="default_value", type="integer", nullable=true)
     */
    private $defaultValue;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", length=1, nullable=true)
     */
    private $active;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return TicketStatus
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set group.
     *
     * @param string $group
     *
     * @return TicketStatus
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group.
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set sortOrder.
     *
     * @param int $sortOrder
     *
     * @return TicketStatus
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder.
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set defaultValue.
     *
     * @param int $defaultValue
     *
     * @return TicketStatus
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * Get defaultValue.
     *
     * @return int
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Set active.
     *
     * @param string $active
     *
     * @return TicketStatus
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }
}
