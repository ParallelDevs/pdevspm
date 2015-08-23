<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsStatus
 *
 * @ORM\Table(name="tickets_status")
 * @ORM\Entity
 */
class TicketsStatus
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
     * @ORM\Column(name="group", type="string", length=64, nullable=true)
     */
    private $group;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var integer
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


}
