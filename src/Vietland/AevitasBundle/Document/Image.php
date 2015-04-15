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
class Image {

    /**
     * @MongoDB\String
     */
    public $path;

    /**
     * @MongoDB\String 
     */
    public $description;

    public function __construct($path, $description) {
        $this->path = $path;
        $this->description = $description;
    }

    public function getPath() {
        return $this->path;
    }

    public function getDescription() {
        return $this->description;
    }

}