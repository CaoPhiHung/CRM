<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author Truong
 */

namespace Aevitas\LevisBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Aevitas\LevisBundle\Document\ItemRepository")
 */
class Item{
    /**
     * @MongoDB\Id(strategy="increment") 
     */
    private $id;

    /**
     * @MongoDB\String 
     */
    private $code;
    
    /**
     * @MongoDB\String 
     */
    private $description;
    
    /**
     * @MongoDB\Float 
     */
    private $discount;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function setCode($code){
        $this->code = $code;
        return $this;
    }
    
    public function getCode(){
        return $this->code;
    }
    
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setDiscount($discount){
        $this->discount = $discount;
        return $this;
    }
    
    public function getDiscount(){
        return $this->discount;
    }
}