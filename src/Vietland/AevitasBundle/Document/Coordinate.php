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
class Coordinate {

    /** @MongoDB\Float */
    public $latitude;

    /** @MongoDB\Float */
    public $longitude;

    public function __construct($lat = 0, $long = 0) {
        $this->latitude = (float)$lat;
        $this->longitude = (float)$long;
    }

    public function getLatLng() {
        return array('latitude' => $this->latitude, 'longitude' => $this->longitude);
    }
    
    public function getLat(){
        return $this->latitude;
    }
    
    public function getLng(){
        return $this->longitude;
    }

}