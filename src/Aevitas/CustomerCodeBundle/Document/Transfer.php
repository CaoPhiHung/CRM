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

namespace Aevitas\CustomerCodeBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument 
 */
class Transfer {

    /**
     * @MongoDB\Id(strategy="increment") 
     */
    protected $id;

    /**
     * @MongoDB\Date
     */
    public $created;

    /**
     * @MongoDB\Int
     */
    public $start;

    /**
     * @MongoDB\Int
     */
    public $end;
    
    /**
     * @MongoDB\Int
     */
    public $used;

    public function __construct($start = 0, $end = 0) {
        $this->start = (int) $start;
        $this->end = (int) $end;
        $this->created = new \DateTime('now');
    }

}
