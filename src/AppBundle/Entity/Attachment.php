<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachment.
 *
 * @ORM\Table(name="attachment", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Attachment
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
     * @ORM\Column(name="bind_type", type="string", length=64, nullable=false)
     */
    private $bindType;

    /**
     * @var int
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bindType.
     *
     * @param string $bindType
     *
     * @return Attachment
     */
    public function setBindType($bindType)
    {
        $this->bindType = $bindType;

        return $this;
    }

    /**
     * Get bindType.
     *
     * @return string
     */
    public function getBindType()
    {
        return $this->bindType;
    }

    /**
     * Set bindId.
     *
     * @param int $bindId
     *
     * @return Attachment
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
     * Set file.
     *
     * @param string $file
     *
     * @return Attachment
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set info.
     *
     * @param string $info
     *
     * @return Attachment
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info.
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }
}
