<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Program
 *
 * @author Truong
 */

namespace Aevitas\PointBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Aevitas\LevisBundle\Document\Store;

/**
 * @MongoDB\Document()
 */
class Program {
    
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;
    
    /**
     * @MongoDB\String
     */
    protected $name;
    
    /**
     * @MongoDB\String
     */
    protected $startDate;
    
    /**
     * @MongoDB\String
     */
    protected $endDate;

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
        return $this;
    }
}
