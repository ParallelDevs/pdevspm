<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_group")
 */
class UserGroup extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection|Permission[]
     *
     * @ORM\ManyToMany(targetEntity="Permission")
     * @ORM\JoinTable(
     *  name="user_group_permissions",
     *  joinColumns={
     *      @ORM\JoinColumn(name="user_group_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     *  }
     * )
     */
    protected $permissions;

    public function __construct($name, $roles = [])
    {
        parent::__construct($name, $roles);
        $this->addRole('ROLE_USER');
        $this->permissions = new ArrayCollection();
    }

    /**
     * @param Permission $permission
     */
    public function addGroup(Permission $permission)
    {
        if ($this->permissions->contains($permission)) {
            return;
        }
        $this->permissions->add($permission);
    }

    /**
     * @param Permission $permission
     */
    public function removeGroup(Permission $permission)
    {
        if (!$this->permissions->contains($permission)) {
            return;
        }
        $this->permissions->removeElement($permission);
    }

    /**
     * @return Permission[]
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}
