<?php

namespace Aevitas\LevisBundle\Document;

/**
 * Description of newClassWithNamespace
 *
 * @author RYANTRAN
 */
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Vietland\AevitasBundle\Helper\Slug;

/**
 * @MongoDB\Document
 */
class Categories {

    //put your code here
    /**
     * @MongoDB\Id(strategy="increment") 
     */
    private $id;

    /**
     * @MongoDB\String 
     */
    public $name;

    /**
     * @MongoDB\String 
     */
    public $slug;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Aevitas\LevisBundle\Document\Categories")
     */
    private $parent;

    /**
     * @MongoDB\String 
     */
    public $description;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        $this->slug = Slug::generateSlug($name);
        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }

}
