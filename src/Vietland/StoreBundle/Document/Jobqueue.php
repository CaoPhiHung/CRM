<?php

/**
 * Description of Jobqueue
 *
 * @author TruongLD
 */

namespace Vietland\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="jobqueue",repositoryClass="Vietland\StoreBundle\Document\JobQueueRepository")
 */
class Jobqueue {

    /**
     * @MongoDB\Id(strategy="increment") 
     */
    protected $id;

    /**
     * @MongoDB\String
     * @MongoDB\Index(unique=true,background=true, order="asc")
     */
    protected $bill;

    /**
     * @MongoDB\String
     */
    protected $data;

    /**
     * @MongoDB\Int
     */
    protected $start;

    /**
     * @MongoDB\Boolean
     */
    protected $status;

    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set bill
     *
     * @param string $bill
     * @return self
     */
    public function setBill($bill) {
        $this->bill = $bill;
        return $this;
    }

    /**
     * Get bill
     *
     * @return string $bill
     */
    public function getBill() {
        return $this->bill;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return self
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Get data
     *
     * @return string $data
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set start
     *
     * @param int $start
     * @return self
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
     * Set status
     *
     * @param boolean $status
     * @return self
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean $status
     */
    public function getStatus() {
        return $this->status;
    }

    public function getDataObject() {
        return json_decode($this->data, true);
    }

    public function getStatusLabel() {
        if ($this->status)
            return 'Done';
        else
            return 'Waiting';
    }

}
