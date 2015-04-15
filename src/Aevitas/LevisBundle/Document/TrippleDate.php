<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HighSeason
 *
 * @author apple
 */

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument 
 */
class TrippleDate {

    /**
     * @todo Gift ID
     * @MongoDB\Date
     */
    public $date;

    /**
     * @todo Gift ID
     * @MongoDB\Boolean
     */
    public $used;

    /**
     * @MongoDB\Id(strategy="increment")
     */
    public $id;

    public function __construct() {
        $this->date = new \DateTime('now');
        $this->used = false;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getDate() {
        return $this->date->format('d-m-Y');
    }

    public function setDate($date) {
        $this->date = new \DateTime($date);
        return $this;
    }

    public function getUsed() {
        return $this->used;
    }

    public function setUsed($used) {
        $this->used = $used;
        return $this;
    }

    public function isEditable() {
        if (date('Y', $this->date->getTimestamp()) < date('Y'))
            return true;
        else
            return !$this->used;
    }

}
