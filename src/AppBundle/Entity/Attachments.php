<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachments
 *
 * @ORM\Table(name="attachments", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Attachments
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
     * @ORM\Column(name="bind_type", type="string", length=64, nullable=false)
     */
    private $bindType;

    /**
     * @var integer
     *
     * @ORM\Column(name="bind_id", type="integer", nullable=false)
     */
    private $bindId;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255, nullable=true)
     */
    private $info;



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
     * Set bindType
     *
     * @param string $bindType
     * @return Attachments
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
     * Set bindId
     *
     * @param integer $bindId
     * @return Attachments
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
     * Set file
     *
     * @param string $file
     * @return Attachments
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return Attachments
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }
}
