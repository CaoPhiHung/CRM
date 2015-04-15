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
class GiftMeta {

    /**
     * @todo Gift ID
     * @MongoDB\Int
     */
    protected $gid;

    /**
     * @MongoDB\Int
     */
    protected $count;

    /**
     * @MongoDB\Int
     */
    protected $ship;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Id(strategy="increment")
     */
    public $id;
    protected $gift;

    const SHIP_STORE_PICKUP = 1;
    const SHIP_POST_DELIVERY = 2;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getGid() {
        return $this->gid;
    }

    public function setGid($gid) {
        $this->gid = $gid;
        return $this;
    }

    public function getCount() {
        return $this->count;
    }

    public function setCount($count) {
        $this->count = $count;
        return $this;
    }

    public function getShip() {
        return $this->ship;
    }

    public function setShip($ship) {
        $this->ship = $ship;
        return $this;
    }

    public function getGift() {
        return $this->gift;
    }

    public function setGift($gift) {
        $this->gift = $gift;
        $this->name = $gift->getName();
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public static function getShippingMethod($trans) {
        return array(self::SHIP_STORE_PICKUP => $trans->trans('Pickup at store'),
                //self::SHIP_POST_DELIVERY => $trans->trans('Post office delivery')
        );
    }

    public function getPoints($dm) {
        $gift = $dm->getRepository('AevitasLevisBundle:GiftArticle')->find((int) $this->gid);
        if (is_object($gift) && $gift instanceof GiftArticle) {
            return $this->count * $gift->getPoint();
        }
        else
            return 0;
    }

}
