<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraFields
 *
 * @ORM\Table(name="extra_fields")
 * @ORM\Entity
 */
class ExtraFields
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
     * @ORM\Column(name="bind_type", type="string", length=64, nullable=false)
     */
    private $bindType;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=64, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var boolean
     *
     * @ORM\Column(name="display_in_list", type="boolean", nullable=true)
     */
    private $displayInList;


}
