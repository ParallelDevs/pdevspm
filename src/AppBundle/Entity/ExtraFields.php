<?php

namespace AppBundle\Entity;

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
     * @return ExtraFields
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
     * Set bindType
     *
     * @param string $bindType
     * @return ExtraFields
     */
    public function setBindType($bindType)
    {
        $this->bindType = $bindType;

        return $this;
    }

    /**
     * Get bindType
     *
     * @return string 
     */
    public function getBindType()
    {
        return $this->bindType;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ExtraFields
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return ExtraFields
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
     * Set active
     *
     * @param boolean $active
     * @return ExtraFields
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

    /**
     * Set displayInList
     *
     * @param boolean $displayInList
     * @return ExtraFields
     */
    public function setDisplayInList($displayInList)
    {
        $this->displayInList = $displayInList;

        return $this;
    }

    /**
     * Get displayInList
     *
     * @return boolean 
     */
    public function getDisplayInList()
    {
        return $this->displayInList;
    }
}
