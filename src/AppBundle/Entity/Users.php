<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="fk_pople_people_group", columns={"users_group_id"})})
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="photo", type="string", length=64, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="culture", type="string", length=5, nullable=true)
     */
    private $culture;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="skin", type="string", length=64, nullable=true)
     */
    private $skin;

    /**
     * @var \AppBundle\Entity\UsersGroups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UsersGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_group_id", referencedColumnName="id")
     * })
     */
    private $usersGroup;


}
