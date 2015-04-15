<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author paulaan
 */

namespace Aevitas\LevisBundle\Document;

/**
 * Description of newClassWithNamespace
 *
 * @author RYANTRAN
 */
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document(repositoryClass="Aevitas\LevisBundle\Document\CartRepository")
 */
class Cart extends AbstractRedeem {

    /**
     * @MongoDB\EmbedMany(targetDocument="GiftMeta")
     */
    protected $gifts;

    /**
     * @MongoDB\String
     */
    protected $address;

    /**
     * @MongoDB\Int
     */
    protected $status;

    const STATUS_PENDING = 1;
    const STATUS_SHIPPING = 2;
    const STATUS_DELIVERED = 3;
    const GIFT_ERROR_EXIST = 2;
    const GIFT_SUCCESS = 0;
    const GIFT_ERROR_OVERPOINT = 1;

    /**
     * @MongoDB\Boolean
     */
    protected $finish = false;

    /**
     * @MongoDB\String
     */
    protected $code;

    public function __construct() {
        parent::__construct();
        $this->gifts = new ArrayCollection();
        $this->status = self::STATUS_PENDING;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getStatusLabel() {
        $status = array(self::STATUS_PENDING => 'Pending', self::STATUS_SHIPPING => 'Shipping', self::STATUS_DELIVERED => 'Delivered');
        return $status[$this->status];
    }

    public function setStatus($status) {
        $this->status = $status;
        if ($this->status == self::STATUS_SHIPPING) {
            if (is_object($this->store))
                $this->sid = $this->store->getOldId();
        }
    }

    public static function getStatusOptions($trans) {
        return array(self::STATUS_PENDING => $trans->trans('Pending'), self::STATUS_SHIPPING => $trans->trans('Shipping'), self::STATUS_DELIVERED => $trans->trans('Delivered'));
    }

    public function removeGift($gift) {
        $exist = false;
        $newgifts = new ArrayCollection();
        $this->gifts->map(function($gm)use($gift, &$newgifts) {
                    if ($gm->getGid() != (int) $gift)
                        $newgifts->add($gm);
                });
        if ($newgifts->count())
            $this->gifts = $newgifts;
        else
            return false;
        return true;
    }

    public function getFinish() {
        return $this->finish;
    }

    public function setFinish($finish) {
        $this->finish = $finish;
        return $this;
    }

    /**
     * 
     * @param \Aevitas\LevisBundle\Document\GiftMeta $gift
     * @param type $dm Document Manager
     * @return boolean success or not
     */
    public function addGiftMeta(GiftMeta $gift, $dm) {
        if (!$gift->getId()) {
            $backup = clone $this->gifts;
            $this->gifts->add($gift);
            //check all gifts is not over the point of this user
            if (is_object($this->user) && $this->checkCurrentPointValid($dm)) {
                $this->gifts = $backup;
                return self::GIFT_ERROR_OVERPOINT;
            }
        } else {
            $backup = clone $this->gifts;
            $newGifts = new ArrayCollection();
            $this->gifts->map(function($r)use($gift, &$newGifts) {
                        if ($r->getId() == $gift->getId()) {
                            $newGifts->add($gift);
                        }
                        else
                            $newGifts->add($r);
                    });
            $this->gifts = $newGifts;
            if (is_object($this->user) && $this->checkCurrentPointValid($dm)) {
                $this->gifts = $backup;
                return self::GIFT_ERROR_OVERPOINT;
            }
        }
        return self::GIFT_SUCCESS;
    }

    private function checkCurrentPointValid($dm) {
        $giftMetas = $this->getGifts($dm);
        $giftChargePoint = 0; // total point for this current gift;
        foreach ($giftMetas as $gift) {
            if (is_object($gift->getGift()))
                $giftChargePoint += $gift->getCount() * $gift->getGift()->getPoint();
        }
        if (is_object($this->user)) {
            if ($giftChargePoint > $this->user->getPoint())
                return self::GIFT_ERROR_OVERPOINT;
            else
                return self::GIFT_SUCCESS;
        }
        return self::GIFT_SUCCESS;
    }

    public function checkPointCapable($dm) {
        $giftMetas = $this->getGifts($dm);
        $giftChargePoint = 0; // total point for this current gift;
        foreach ($giftMetas as $gift) {
            if (is_object($gift->getGift()))
                $giftChargePoint += $gift->getCount() * $gift->getGift()->getPoint();
        }
        if (is_object($this->user)) {
            if ($giftChargePoint > $this->user->getPoint())
                return 0;
            else
                return $giftChargePoint;
        }
        return $giftChargePoint;
    }

    public function getGifts($dm) {
        $giftIds = array();
        $giftMetas = array();
        $this->gifts->map(function($g)use(&$giftIds, &$giftMetas) {
                    $giftIds[] = $g->getGid();
                    if (is_object($g))
                        $giftMetas[$g->getGid()] = $g;
                });
        $gifts = $dm->createQueryBuilder('AevitasLevisBundle:GiftArticle')->field('id')->in($giftIds)->getQuery()->execute();
        foreach ($gifts as $gift) {
            $giftMetas[$gift->getId()]->setGift($gift);
        }
        return $giftMetas;
    }

    public function count() {
        return $this->gifts->count();
    }

    /**
     * @todo Add Gift
     * @param \Aevitas\LevisBundle\Document\GiftArticle $gift
     * @return boolean success or not
     */
    public function addGift(GiftArticle $gift, $dm) {
        $exist = false;
        $this->gifts->map(function($gm)use($gift, &$exist) {
                    if ($gm->getGid() == $gift->getId())
                        $exist = true;
                });
        if ($exist)
            return self::GIFT_ERROR_EXIST;
        else {
            $giftmeta = new GiftMeta();
            $giftmeta->setGid($gift->getId())->setCount(1)->setShip(GiftMeta::SHIP_STORE_PICKUP);
            return $this->addGiftMeta($giftmeta, $dm);
        }
    }

    public function getMessageStatus($error) {
        if (self::GIFT_ERROR_EXIST == $error)
            return 'This gift is already exist';
        else if (self::GIFT_ERROR_OVERPOINT == $error)
            return 'Your points is not enough to redeem anymore';
        else
            return 'This gift has been added successfully';
    }

    public function getRedeem() {
        if ($this->status == self::STATUS_DELIVERED)
            return true;
        else
            return false;
    }

    public function getCode() {
        return $this->hash;
    }

    public function setCode($code) {
        $this->hash = $code;
        return $this;
    }

    public function generateCode() {
        $character_set_array = array();
        $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHJKLMNPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 4, 'characters' => '123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        $this->hash = implode('', $temp_array);
        return $this->hash;
    }

    public function getVnd() {
        return '';
    }

    public function getData() {
        $data = array();
        foreach ($this->gifts as $gmeta) {
            $data[] = $gmeta->getName();
        }
        if (!empty($data))
            return implode(',', $data);
        else
            return '';
    }
    
    public function getType() {
        return 'gift';
    }

}
