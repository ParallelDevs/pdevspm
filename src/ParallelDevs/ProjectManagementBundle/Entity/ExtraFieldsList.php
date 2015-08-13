<?php

namespace ParallelDevs\ProjectManagementBundle\Entity;

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
     * @var \ParallelDevs\ProjectManagementBundle\Entity\ExtraFields
     *
     * @ORM\ManyToOne(targetEntity="ParallelDevs\ProjectManagementBundle\Entity\ExtraFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="extra_fields_id", referencedColumnName="id")
     * })
     */
    private $extraFields;



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
     * Set bindId
     *
     * @param integer $bindId
     * @return ExtraFieldsList
     */
    public function setBindId($bindId)
    {
        $this->bindId = $bindId;

        return $this;
    }

    /**
     * Get bindId
     *
     * @return integer 
     */
    public function getBindId()
    {
        return $this->bindId;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return ExtraFieldsList
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set extraFields
     *
     * @param \ParallelDevs\ProjectManagementBundle\Entity\ExtraFields $extraFields
     * @return ExtraFieldsList
     */
    public function setExtraFields(\ParallelDevs\ProjectManagementBundle\Entity\ExtraFields $extraFields = null)
    {
        $this->extraFields = $extraFields;

        return $this;
    }

    /**
     * Get extraFields
     *
     * @return \ParallelDevs\ProjectManagementBundle\Entity\ExtraFields 
     */
    public function getExtraFields()
    {
        return $this->extraFields;
    }
}
