<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsTypes
 *
 * @ORM\Table(name="tickets_types")
 * @ORM\Entity
 */
class TicketsTypes
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
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", length=1, nullable=true)
     */
    private $active;


}
