<?php

namespace Aevitas\LevisBundle\Document;

/**
 * Description of Store
 *
 * @author RYANTRAN
 */
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Aevitas\LevisBundle\Document\StoreRepository")
 */
class Store {

    /**
     * @MongoDB\Id(strategy="increment") 
     */
    private $id;

    /**
     * @MongoDB\Int 
     */
    private $oldId;

    /**
     * @MongoDB\String 
     */
    private $name;

    /**
     * @MongoDB\String 
     */
    private $address;

    /**
     * @MongoDB\String
     */
    private $address2;

    /**
     * @MongoDB\String
     */
    private $address3;

    /**
     * @MongoDB\Int
     */
    protected $city;

    /**
     * @MongoDB\Int
     */
    protected $district;

    /**
     * @MongoDB\String
     */
    private $phone;

    /**
     * @MongoDB\String
     */
    private $email;

    /**
     * @MongoDB\String
     */
    private $fax;

    /**
     * @MongoDB\String 
     */
    public $alias;

    /**
     * @MongoDB\Int
     */
    public $userId;

    /**
     * @MongoDB\Boolean
     */
    public $visible = false;

    public function __construct() {
        $this->visible = false;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getVisible() {
        return $this->visible;
    }

    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    public function getOldId() {
        return $this->oldId;
    }

    public function setOldId($oldId) {
        $this->oldId = $oldId;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
        return $this;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
        return $this;
    }

    public function getAddress3() {
        return $this->address3;
    }

    public function setAddress3($address3) {
        $this->address3 = $address3;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setFax($fax) {
        $this->fax = $fax;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }

}
