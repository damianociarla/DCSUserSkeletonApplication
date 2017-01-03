<?php

namespace DCS\UserBundle\Entity;

use DCS\User\CoreBundle\Model\User as UserBase;
use DCS\Role\Provider\ORMBundle\Model\UserRoleCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends UserBase
{
    use UserRoleCollection;

    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @var UuidInterface
     *
     * @ORM\ManyToMany(targetEntity="DCS\RoleBundle\Entity\Role")
     * @ORM\JoinTable(name="user_role",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     *   }
     * )
     */
    protected $roles;
}