<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractRedeem
 *
 * @author paulaan
 */

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\MappedSuperclass
 * @MongoDB\Document(collection="redeem")
 * @MongoDB\InheritanceType("SINGLE_COLLECTION")
 * @MongoDB\DiscriminatorField(fieldName="type")
 * @MongoDB\DiscriminatorMap({"gift"="Aevitas\LevisBundle\Document\Cart","vnd"="Aevitas\LevisBundle\Document\UserConvertPoint"})
 */
class AbstractRedeem {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    public $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Vietland\UserBundle\Document\User", inversedBy="carts")
     */
    protected $user;

    /**
     * @todo User Id
     * @MongoDB\Int
     */
    protected $uid;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Store")
     */
    protected $store;

    /**
     * @MongoDB\Date
     */
    protected $created;

    /**
     * @MongoDB\Int
     */
    protected $sid;

    /**
     * @MongoDB\String
     */
    protected $hash;

    /**
     * @MongoDB\Boolean
     */
    protected $auth;

    /**
     * @MongoDB\Int 
     */
    protected $point;

    /**
     * @MongoDB\Float
     */
    protected $bPoint;

    /**
     * @MongoDB\Float
     */
    protected $aPoint;

    public function __construct() {
        $this->created = new \DateTime();
        $this->hash = $this->generateRandomString(8);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
        $this->uid = $user->getId();
        return $this;
    }

    public function setPoint($point) {
        $this->point = $point;
        return $this;
    }

    public function getPoint() {
        return $this->point;
    }

    public function getStore() {
        return $this->store;
    }

    public function setStore($store) {
        $this->store = $store;
        $this->sid = $store->getOldId();
        return $this;
    }

    private function generateRandomString($length = 32) {
        $characters = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function getHash() {
        return $this->hash;
    }

    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    public function setAuth($auth) {
        $this->auth = $auth;
        return $this;
    }

    public function getAuth() {
        return $this->auth;
    }

    public function getSid() {
        return $this->sid;
    }

    public function setSid($sid) {
        $this->sid = $sid;
        return $this;
    }

    public function getBPoint() {
        return $this->bPoint;
    }

    public function setBPoint($bPoint) {
        $this->bPoint = $bPoint;
        return $this;
    }

    public function getAPoint() {
        return $this->aPoint;
    }

    public function setAPoint($aPoint) {
        $this->aPoint = $aPoint;
        return $this;
    }
    
    public function getType(){
        return '';
    }

}