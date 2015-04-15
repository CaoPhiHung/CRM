<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coordinates
 *
 * @author paulaan
 */

namespace Vietland\AevitasBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="district")
 */
class District {

    /**
     * @MongoDB\Id(strategy="increment") 
     */
    protected $id;

    /**
     * @MongoDB\Int
     */
    protected $map;

    /**
     * @MongoDB\Int
     */
    protected $cityId;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Int
     */
    protected $range;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getCityId() {
        return $this->cityId;
    }

    public function setCityId($cityId) {
        $this->cityId = $cityId;
        return $this;
    }

    public function getMap() {
        return $this->map;
    }

    public function setMap($ID) {
        $this->map = $ID;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getRange() {
        return $this->range;
    }

    public function setRange($range) {
        $this->range = $range;
        return $this;
    }

}