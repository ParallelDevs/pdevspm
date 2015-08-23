<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraFieldsList
 *
 * @ORM\Table(name="extra_fields_list", indexes={@ORM\Index(name="fk_extra_fields_list_extra_fields", columns={"extra_fields_id"})})
 * @ORM\Entity
 */
class ExtraFieldsList
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
     * @var integer
     *
     * @ORM\Column(name="bind_id", type="integer", nullable=false)
     */
    private $bindId;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=false)
     */
    private $value;

    /**
     * @var \AppBundle\Entity\ExtraFields
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ExtraFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="extra_fields_id", referencedColumnName="id")
     * })
     */
    private $extraFields;


}
