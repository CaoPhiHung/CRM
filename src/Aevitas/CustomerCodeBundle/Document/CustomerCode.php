<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aevitas\CustomerCodeBundle\Document;

/**
 * Description of CustomerCode
 *
 * @author naygum
 */
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Vietland\AevitasBundle\Helper\Slug;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document
 */
class CustomerCode {

    /**
     * @MongoDB\Id(strategy="increment") 
     */
    private $id;

    /**
     * @MongoDB\Int
     * @MongoDB\Index(unique=true, order="asc")
     */
    public $prefix;

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

    /**
     * @MongoDB\ReferenceOne(targetDocument="Aevitas\LevisBundle\Document\Store")
     */
    private $store;

    /**
     * @MongoDB\EmbedMany(targetDocument="Transfer")
     */
    protected $trans;

    public function __construct() {
        $this->trans = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     * @return \CustomerCode
     */
    public function setPrefix($prefix) {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * Get prefix
     *
     * @return string $prefix
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * Set start
     *
     * @param int $start
     * @return \CustomerCode
     */
    public function setStart($start) {
        $this->start = $start;
        return $this;
    }

    /**
     * Get start
     *
     * @return int $start
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param int $end
     * @return \CustomerCode
     */
    public function setEnd($end) {
        $this->end = $end;
        return $this;
    }

    /**
     * Get end
     *
     * @return int $end
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * Set store
     *
     * @param Aevitas\LevisBundle\Document\Store $store
     * @return \CustomerCode
     */
    public function setStore(\Aevitas\LevisBundle\Document\Store $store) {
        $this->store = $store;
        return $this;
    }

    /**
     * Get store
     *
     * @return Aevitas\LevisBundle\Document\Store $store
     */
    public function getStore() {
        return $this->store;
    }

    public function checkStartEnd(ExecutionContextInterface $context) {
        exit('tessting');
        if ($this->start >= $this->end)
            $context->addViolationAt('invalid', 'START attribute should be less than END');
    }

    public function getTrans() {
        return $this->trans;
    }

    public function addTransfer(Transfer $tran) {
        if ($tran->start >= $tran->end)
            return false;
        if (is_object($this->trans) && $this->trans->count()) {
            $lastTrans = $this->trans->last();
            if ($tran->start == $lastTrans->end + 1 && $tran->end < $this->end)
                $this->trans->add($tran);
            else
                return false;
        } else {
            if ($this->start == $tran->start && $tran->end < $this->end) {
                $this->trans = new ArrayCollection();
                $this->trans->add($tran);
            }
            else
                return false;
        }
        return true;
    }

    public function createNewTransfer() {
        if (is_object($this->trans) && $this->trans->count())
            $start = ($this->trans->last()->end + 1);
        else
            $start = $this->start;
        return new Transfer($start, $this->end - 1);
    }

    public function setUsedById($id) {
        foreach ($this->trans as $tran) {
            if ($tran->start <= $id && $id <= $tran->end) {
                $tran->used++;
                break;
            }
        }
        $this->used++;
    }

    public function getUsed() {
        return $this->used;
    }

}
