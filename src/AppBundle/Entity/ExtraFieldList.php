<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtraFieldList.
 *
 * @ORM\Table(name="extra_field_list", indexes={@ORM\Index(name="fk_extra_field_list_extra_field", columns={"extra_field_id"})})
 * @ORM\Entity
 */
class ExtraFieldList
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
     * @var int
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
     * @var \AppBundle\Entity\ExtraField
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ExtraField")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="extra_field_id", referencedColumnName="id")
     * })
     */
    private $extraField;

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
     * Set bindId.
     *
     * @param int $bindId
     *
     * @return ExtraFieldList
     */
    public function setBindId($bindId)
    {
        $this->bindId = $bindId;

        return $this;
    }

    /**
     * Get bindId.
     *
     * @return int
     */
    public function getBindId()
    {
        return $this->bindId;
    }

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return ExtraFieldList
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set extraField.
     *
     * @param \AppBundle\Entity\ExtraField $extraField
     *
     * @return ExtraFieldList
     */
    public function setExtraField(\AppBundle\Entity\ExtraField $extraField = null)
    {
        $this->extraField = $extraField;

        return $this;
    }

    /**
     * Get extraField.
     *
     * @return \AppBundle\Entity\ExtraField
     */
    public function getExtraField()
    {
        return $this->extraField;
    }
}
