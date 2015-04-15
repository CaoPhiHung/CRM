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

/** @MongoDB\EmbeddedDocument */
class Location {

    /**
     * @MongoDB\EmbedOne(targetDocument="Coordinate") 
     */
    private $coordinate;

    /**
     * @MongoDB\String
     */
    private $name;

    public function getCoordinate() {
        return $this->coordinate;
    }

    public function setCoordinate($coordinate) {
        $this->coordinate = $coordinate;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}