<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *
 * @author paulaan
 */

namespace Vietland\UserBundle\Document;

use FOS\UserBundle\Document\Group as BaseGroup;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\PersistentCollection;

/**
 * @MongoDB\Document(collection="groups")
 */
class Group extends BaseGroup {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="User")
     */
    protected $users;

    /**
     * @var array
     */
    protected $roles;

    /**
     * @MongoDB\ReferenceOne(targetDocument="User", inversedBy="staff")
     */
    protected $admin;

    const ROLE_DEFAULT = 'ROLE_USER';

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAdmin(User $admin) {
        $this->admin = $admin;
        return $this;
    }

    /**
     * Get admin
     *
     * @return Vietland\UserBundle\Document\User $admin
     */
    public function getAdmin() {
        return $this->admin;
    }

    public function __construct() {
        $this->users = new ArrayCollection();
        $this->roles[] = $this::ROLE_DEFAULT;
    }
    

    /**
     * Add users
     *
     * @param Vietland\UserBundle\Document\User $users
     */
    public function addUser(\Vietland\UserBundle\Document\User $user) {
        $exist = false;
        $this->users->map(function($usr)use(&$exist,$user) {
                    if ($usr->getId() == $user->getId())
                        $exist = true;
                });
        if (!$exist) {
            $this->users->add($user);
            return true;
        }
        return false;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection $users
     */
    public function getUsers() {
        return $this->users;
    }

    /**
     * Remove user
     *
     * @param Vietland\UserBundle\Document\User $user
     */
    public function removeUser(\Vietland\UserBundle\Document\User $user)
    {
        $this->users->removeElement($user);
    }
}
