<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anniversary
 *
 * @author apple
 */

namespace Vietland\AevitasBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
class Anniversary {

    /**
     * @MongoDB\Id(strategy="increment")
     */
    public $id;

    /**
     * @MongoDB\Date
     */
    public $date;

    /**
     * @MongoDB\String
     */
    public $name;

    public function __construct() {
        $this->name = '';
        $this->date = new \DateTime('now');
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}