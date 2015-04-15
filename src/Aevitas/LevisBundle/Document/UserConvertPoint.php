<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserConvertPoint
 *
 * @author Truong LD <mr.truongld at gmail.com>
 */

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document()
 */
class UserConvertPoint extends AbstractRedeem {

    /**
     * @MongoDB\Int 
     */
    private $vnd;

    /**
     * @MongoDB\Float
     */
    private $baserate;

    public function __construct() {
        parent::__construct();
        $this->auth = false;
    }

    public function setVnd($vnd) {
        $this->vnd = $vnd;
        return $this;
    }

    public function getVnd() {
        return $this->vnd;
    }

    public function getData() {
        return $this->getVnd() . 'VND';
    }

    public function getBaserate() {
        return $this->baserate;
    }

    public function setBaserate($baserate) {
        $this->baserate = $baserate;
        return $this;
    }
    
    public function getType() {
        return 'point';
    }

}
